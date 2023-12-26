@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="align-content-center">
                    <form method="POST" action="{{ route('home.update', ['user' => $user->id, 'reservation' => $reservation->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Your form fields go here -->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tel_number">Phone Number</label>
                            <input type="text" id="tel_number" name="tel_number" value="{{ $reservation->tel_number }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="res_date">Reservation Date</label>
                            <input type="datetime-local" id="res_date" name="res_date" value="{{ $reservation->res_date->format('Y-m-d\TH:i:s') }}" class="form-control">
                        </div>

                        <div class="mt-6 p-4 flex justify-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
