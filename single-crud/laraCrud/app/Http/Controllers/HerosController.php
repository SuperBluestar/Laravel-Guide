<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $heros = Hero::all();

        return view('heros.index',compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('1');
        return view('heros.create');
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
        $hero = new Hero();

        $hero->name = request('name');
        $hero->work = request('work');

        $hero->save();

        return redirect('/heros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $hero = Hero::findOrFail($id);
        return view('heros.show',compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $heros = Hero::findOrFail($id);
        return view('heros.edit',compact('heros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        //
        //dd('grttt');

        $hero = Hero::findOrFail($id);

        $hero->name = request('name');
        $hero->work = request('work');

        $hero->save();

        return redirect('/heros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('dele');
        Hero::findOrFail($id)->delete();
        return redirect('/heros');
    }
}
