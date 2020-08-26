<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	return view('comptes.create');
    }

    public function modificationMotDePasse()
    {
    	request()->validate([

            'password' => ['required', 'confirmed', 'min:4'],
            'password_confirmation' => ['required'],
        ]);

        Auth()->user()->update([

        	'password' => bcrypt(request('password')),
       ]);

        return back()->with('success', 'Votre mot de passe à bien été mis à jour.');
    }
}
