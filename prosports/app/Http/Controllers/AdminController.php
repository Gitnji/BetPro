<?php

namespace App\Http\Controllers;

// use App\Models\users;
use App\Models\Admin;
use App\Models\User;
use App\Models\bets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $users = Admin::all();
    $totalUsers = Admin::count();
    $bets = bets::all();

    return view('betpro.admin', compact('users', 'totalUsers', 'bets'));

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
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //

    }
    public function storebets(Request $request)
    {
    // Log incoming request for debugging
    Log::info('storebets called', ['input' => $request->all(), 'ip' => $request->ip()]);
    try {
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
    // analysis column is non-nullable in DB; default to empty string when not provided
    $bets->analysis = $request->analysis ?? '';
        if($bets->save()){
            return redirect(route('betpro.admin'))->with("success","Bet created");
        }else{
            return redirect(route("betpro.admin"))->with("error","check your bets");
    }
        } catch (\Throwable $e) {
            Log::error('storebets error', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect(route('betpro.admin'))->with("error","An error occurred, check logs");
        }
    }
}