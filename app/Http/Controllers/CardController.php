<?php

namespace App\Http\Controllers;

use App\Card;
use App\Event;
use App\Font;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cards = Card::paginate(20);
        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::where('active', true)->get();
        if ($events->count() == 0){
            return back()->with(['message' => 'Please Note: Crete Event Before Add New Card', 'class' => 'danger']);
        }
        return view('admin.cards.create', compact('events'));
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
        $card = new Card();
        $card->event_id = $request->input('event_id');
        if($request->hasFile('url')) {

            $validatedData = $request->validate([
                'url' => 'mimes:jpeg,bmp,png,jpg',
            ]);

            $file       = $request->file('url');
            $ext = $file->getClientOriginalExtension();
            $filename    = 'card-' . rand(100000000,999999999).'.'.$ext;
            $file->move('uploads/cards/' , $filename);

        }
        $card->url = 'uploads/cards/' . $filename;
        $card->text_color = '#000000';

        $card->positionX = 0;
        $card->positionY = 0;
        $card->font_size = 16;

        $card->save();

        return redirect(route('cards.index'))->with(['message' => 'Card Added Successfully', 'class' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
        $events = Event::where('active', true)->get();
        $width = Image::make($card->url)->width();
        $height = Image::make($card->url)->height();
        $fonts = Font::all();
        return view('admin.cards.edit', compact('card', 'events', 'width', 'height', 'fonts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
        $card->event_id = $request->input('event_id');
        $card->positionX = $request->input('positionX');
        $card->positionY = $request->input('positionY');
        $card->text_color = $request->input('text_color');
        $card->font_size = $request->input('font_size');
        $card->font_id = $request->input('font_id');
        if($request->input('active') == ''){
            $card->active = 0;
        }else {
            $card->active = 1;
        }
        $card->save();
        return back()->with(['message' => 'Card Updated Successfully', 'class' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
