<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }


    public function __construct(){
        $this->middleware('guest');
    }



    /**
     * Display the resource.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');

    }

     /**
     * Store the newly created resource in storage.
     */
    public function register(Request $request)
    {

          $validate = $request->validate([
              'name'=> ['required','string','between:5,255'],
              'email'=> ['required','email', 'unique:users'],
              'password'=>['required','string','min:8','confirmed']
          ]);

          $validate['password'] = Hash::make($validate['password']);

          $user = User::create($validate);
          //dd($validate);

          //authentification
          Auth::login($user);

          return redirect()->route('home')->withStatus('Inscription reussi');

    }
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
