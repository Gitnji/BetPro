<?php

namespace App\Http\Controllers;

// use App\Models\users;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
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

    return view('betpro.admin', compact('users', 'totalUsers'));

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
//     public function showname(){
//        $user = Auth::user();

    
//     if ($user) {
        
//         return view('betpro.admin', compact('user'));
//    }
//    }
}
