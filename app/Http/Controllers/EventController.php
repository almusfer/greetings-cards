<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::paginate(20);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.events.create');
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
        $validatedData = $request->validate([
            'name' => 'required|unique:events|max:255',
            'description' => 'required',
        ]);

        $event = new Event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        if($request->input('active') == ''){
            $event->active = 0;
        }else {
            $event->active = 1;
        }
        $event->save();

        return redirect(route('events.index'))->with(['message' => 'Event Created Successfully', 'class' => 'success']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        if($request->input('active') == ''){
            $event->active = 0;
        }else {
            $event->active = 1;
        }

        $event->save();

        return redirect(route('events.index'))->with(['message' => 'Event Updated Successfully', 'class' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        return redirect(route('events.index'))->with(['message' => 'Event Deleted Successfully', 'class' => 'success']);

    }
}
