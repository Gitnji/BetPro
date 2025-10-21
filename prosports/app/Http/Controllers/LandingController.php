<?php

namespace App\Http\Controllers;

use App\Models\landing;
use App\Models\Bets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bets = Bets::all();
        
    $today = Carbon::today()->toDateString();

    $records = Bets::whereDate('bet_date', $today)->get();

    return view('betpro.index', compact('bets'));

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(landing $landing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(landing $landing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, landing $landing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(landing $landing)
    {
        //
    }
}
