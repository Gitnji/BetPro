<?php

namespace App\Http\Controllers;

use App\Models\bets;
use Illuminate\Http\Request;

class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bets = bets::all();
        return view('betpro.admin', compact('bets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bet_date' => 'required|date',
            'sport' => 'required|string|max:255',
            'confidence' => 'required|integer|min:0|max:100',
            'event' => 'required|string|max:255',
            'bet_type' => 'required|string|max:255',
            'odds' => 'required|numeric',
            'plan' => 'required|string|max:255',
            'event_time' => 'required|date',
            'analysis' => 'nullable|string',
        ]);
        $bets = new bets();
        $bets->bet_date = $request->bet_date;
        $bets->sport = $request->sport;
        $bets->confidence = $request->confidence;
        $bets->event = $request->event;
        $bets->bet_type = $request->bet_type;
        $bets->odds = $request->odds;
        $bets->plan = $request->plan;
        $bets->event_time = $request->event_time;
        $bets->analysis = $request->analysis;
        if($bets->save()){
            return redirect(route('betpro.admin'))->with("success","Bet created");
        }else{
            return redirect(route("betpro.admin"))->with("error","check your bets");
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(bets $bets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bets $bets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bets $bets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bets $bets)
    {
        //
    }
}
