<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request) {
        return view('Main/register');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'nama'=> ['required','min:3'],
            'username'=> ['required','min:3'],
            'email'=>['required','min:6'],
            'telp'=>['required','min:6'],
            'password'=>['required','min:6']
        ]);
        return view('Main/homepage');
    }
}
