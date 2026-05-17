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

    // Fixed: Changed from real-estate() to realEstate() (no hyphen allowed)
    public function realEstate()
    {
        return view('pages.real-estate');
    }
    
    public function education()
    {
        return view('pages.education');
    }
    
    public function settings()
    {
        return view('pages.settings');
    }
}