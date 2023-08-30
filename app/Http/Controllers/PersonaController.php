<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function projet()
    {
        return view('projet');
    }

    public function resum()
    {
        return view('resum');
    }

    public function contact()
    {
        return view('contact');
    }

    public function formContact(Request $request){
        return view('contact', ['data' => $request]);
    }
}
