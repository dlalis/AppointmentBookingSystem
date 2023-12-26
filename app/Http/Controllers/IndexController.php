<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Reservation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function main()
    {
        return view('home.index');
    }

    public function redirects()
    {
        return redirect(auth()->user()->id . '/home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $reservations = Reservation::all();
        return view('home.index', compact('user','reservations'));
    }
}
