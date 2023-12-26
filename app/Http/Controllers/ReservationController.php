<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $reservations = Reservation::where('user_id', $user->id)->get();
        return view('home.index', compact('user','reservations'));
    }

    public function create(User $user, Request $request)
    {
        $reservation = $request->session()->get('reservations');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('home.reservations.create', compact('user','reservation', 'min_date', 'max_date'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'tel_number' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
        ]);
        $request->user()->reservations()->create($data);

        return redirect(auth()->user()->id . '/home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user, $id)
    {
        $user = Auth::user();
        $reservation = Reservation::findOrFail($id);

        return view('home.reservations.edit', compact('user', 'reservation'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($user, Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'tel_number' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'tel_number' => $request->input('tel_number'),
            'res_date' => $request->input('res_date'),
        ]);

        return redirect(auth()->user()->id . '/home');
//        return redirect()->route(auth()->user()->id . '/home')->with('success', 'Reservation updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Reservation $reservation)
    {
        $reservation->delete();

//        return redirect()->route('home.index', ['user' => $user->id]);
        return redirect(auth()->user()->id . '/home');
    }
}
