<?php

namespace App\Http\Controllers;

use App\Card;
use App\Event;
use App\Font;
use App\GeneratedCards;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Johntaa\Arabic\I18N_Arabic;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::where('active', true)->get();
        return view('welcome', compact('events'));
    }

    public function event_step(Request $request)
    {
        $event = Event::find($request->input('event_name'));
        return view('home', compact('event'));
    }

    public function card_step($id)
    {
        $card = Card::find($id);
        return view('step.card', compact('card'));
    }

    public function generate(Request $request)
    {
        $name = $request->input('user_name');
        $card = Card::find($request->input('card_id'));
        $font = Font::find($card->font_id);

        $Arabic = new I18N_Arabic('Glyphs');
        $fullname = $Arabic->utf8Glyphs($name);
        $new_card = Image::make(public_path($card->url));


        $new_card->text($fullname, $card->positionX, $card->positionY, function($text) use ($card, $font) {

            $text->file(public_path($font->url));

            $text->size($card->font_size);

            $text->color($card->text_color);

            $text->align('right');

            $text->valign('bottom');

            $text->angle(360);

        });

        $newName = 'uploads/genereted/card-'.rand(100000000,999999999).'.png';
        $new_card->save(public_path($newName));

        $save = new GeneratedCards();
        $save->event_id = $card->event->id;
        $save->card_id = $card->id;
        $save->card_url = $newName;
        $save->user_name = $name;
        $save->save();

        return redirect(route('result.step', ['id' => $save->id]));


    }

    public function result($id)
    {
        $card = GeneratedCards::find($id);
        return view('step.result', compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
