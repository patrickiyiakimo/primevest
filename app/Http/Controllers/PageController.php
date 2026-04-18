<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function trading()
    {
        return view('pages.trading');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
    
    public function company()
    {
        return view('pages.company');
    }
    
    public function education()
    {
        return view('pages.education');
    }
}