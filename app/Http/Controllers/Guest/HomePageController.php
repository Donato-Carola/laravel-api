<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('guest.index'); // Sostituisci 'guest.index' con il nome della tua vista
    }
}
