<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Mail\SendForm;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact() 
    {
        return view('contact');
    }

    public function sendForm(Request $request)
    {
        $formData = $request->all(); 

        Mail::to('admin@boolpress.com')->send(new SendForm($formData));

        return redirect()->route('contact');
    }
}
