<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('home.reservations.create');
    }
}
