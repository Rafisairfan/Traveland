<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login (Request $request) {
        return view('Main/login');
    }
    public function validation (request $request) {
        
        $request->validate([
            'username'=>['required','min:3'],
            'password' =>['required','min:6']
        ]);
        return view('Main/homepage');
    }
}

