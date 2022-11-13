<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function welcome()
    {

        return view('welcome');
    }

    public function home()
    {
        return view('pages.user.home');
    }

    public function contact()
    {
        return view('pages.guest.contact');
    }
}
