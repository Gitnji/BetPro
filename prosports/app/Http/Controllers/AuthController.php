<?php

namespace App\Http\Controllers;

use App\Models\users;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login(request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);

        $data = $request->only(["email","password"]);
        if(Auth::attempt($data)){
           $user = Auth::user();

           if ($user->role === 'admin') {
               return redirect(route('betpro.admin'))->with("success","welcome admin");
           } else {
               return redirect(route('betpro.dashboard'))->with("success","welcome user");
           }
        }else{
            return redirect(route("betpro.login"))->with("error","invalid user credentials");
        }
    }
    public function Register(request $request){
        $request->validate([
            "name" => "required",
            "email"=> "required",
            "password"=> "required",
        ]);
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($user->save()){
            return redirect(route('betpro.login'))->with("success","user created");
        }else{
            return redirect(route("betpro.register"))->with("error","check your details");
        }
   }

   public function user(){
       $user = Auth::user();

    
    if ($user) {
        
        return view('betpro.dashboard', compact('user'));
   }
   }
}