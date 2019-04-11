<?php

namespace App\Http\Controllers;

use App\Font;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fonts = Font::paginate(50);
        return view('admin.fonts.index', compact('fonts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.fonts.create');
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
        if($request->hasFile('url')) {

            $validatedData = $request->validate([
                //'url' => 'mimes:ttf',
                'name' => 'required|unique:fonts|min:3|max:255',
            ]);

            $file       = $request->file('url');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'ttf'){
                return back()->with(['message' => 'Font must be ttf file', 'class' => 'danger']);
            }
            $filename    = 'font-' . rand(100000000,999999999).'.'.$ext;
            $file->move('uploads/fonts/' , $filename);

            $font = new Font();
            $name = Str::slug($request->input('name'), '-');
            $font->name = $name;
            $font->url = 'uploads/fonts/' . $filename;
            $font->save();

            return redirect(route('fonts.index'))->with(['message' => 'Font Created Successfully', 'class' => 'success']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function show(Font $font)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function edit(Font $font)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Font $font)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function destroy(Font $font)
    {
        //
    }
}
