<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingPage'); // Sesuaikan dengan nama file blade landing page Anda
    }
}