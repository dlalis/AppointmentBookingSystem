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
        if (ReservationController::authenticate($user)) {
            $reservations = Reservation::where('user_id', $user->id)->get();
            return view('home.index', compact('user','reservations'));
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized action.');
        }
    }

    public function create(User $user, Request $request)
    {
        if (ReservationController::authenticate($user)) {
            $reservation = $request->session()->get('reservations');
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            return view('home.reservations.create', compact('user', 'reservation', 'min_date', 'max_date'));
        }
        else
            abort(403, 'Unauthorized action.');
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

        // Get the selected reservation date from the request and set the timezone to Greece/Athens
        $selectedDateTime = Carbon::parse($request->input('res_date'));//->timezone('Europe/Athens');

        // Get all reservation dates from the database and set the timezone to Greece/Athens
        $allReservationDates = Reservation::pluck('res_date')->map(function ($date) {
            return Carbon::parse($date);//->timezone('Europe/Athens');
        })->toArray();

        // Check if the selected date and time is within the allowed time range (10:00 to 20:00)
        $allowedStartTime = Carbon::now()->setTime(10, 0, 0);
        $allowedEndTime = Carbon::now()->setTime(20, 0, 1);

        if ($selectedDateTime->lessThan($allowedStartTime) || $selectedDateTime->greaterThanOrEqualTo($allowedEndTime)) {
            // The selected time is outside the allowed time range
            return redirect()->back()->withErrors(['res_date' => 'Appointments can only be made between 10:00 and 20:00.']);
        }

        // Check if the selected date and time overlaps with any existing reservation
        foreach ($allReservationDates as $reservation) {
            // Check if there is an overlap within the 1-hour duration
            if ($selectedDateTime->greaterThanOrEqualTo($reservation) && $selectedDateTime->lessThan($reservation->copy()->addHour())) {
                // The selected time overlaps with an existing reservation
                return redirect()->back()->withErrors(['res_date' => 'The selected time overlaps with an existing reservation.']);
            }
        }

        $request->user()->reservations()->create($data);

        return redirect(auth()->user()->id . '/home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $reservation = Reservation::findOrFail($id);

        //prevent user access/edit other user reservations
        if (ReservationController::authenticate($user) && $reservation->user_id == $user->id) {
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            return view('home.reservations.edit', compact('user', 'reservation', 'min_date', 'max_date'));
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized action.');
        }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Reservation $reservation)
    {
        $reservation->delete();

        return redirect(auth()->user()->id . '/home');
    }

    public function authenticate(User $user): bool
    {
        if(auth()->user()->id == $user->id)
            return true;

        return false;
    }
}
