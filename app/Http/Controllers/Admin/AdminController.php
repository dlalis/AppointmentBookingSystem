<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use App\Models\User;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if (ReservationController::authenticate($user)) {
            $reservations = Reservation::all();
            return view('admin.index', compact('user','reservations'));
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized action.');
        }
    }

    public function create(User $user, Request $request)
    {
        $reservation = $request->session()->get('reservations');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('admin.reservations.create', compact('user','reservation', 'min_date', 'max_date'));
    }

    public function edit(User $user, $id)
    {
        //Authenticate that user is trying to access their data and not else's.
        if (ReservationController::authenticate($user)) {
            $reservation = Reservation::findOrFail($id);
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            return view('admin.reservations.edit', compact('user', 'reservation', 'min_date', 'max_date'));
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized action.');
        }
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

        return redirect(auth()->user()->id . '/admin');
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

        return redirect(auth()->user()->id . '/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Reservation $reservation)
    {
        $reservation->delete();
        return redirect(auth()->user()->id . '/home');
    }
}
