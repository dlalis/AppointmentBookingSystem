@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div style="padding-left: 30%;" class="align-content-center">

            <form method="POST" action="{{ route('home.store') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name
                    </label>
                    <div class="mt-1">
                        <input type="text" id="first_name" name="first_name"
                               value="{{ $reservation->first_name ?? '' }}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('first_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name
                    </label>
                    <div class="mt-1">
                        <input type="text" id="last_name" name="last_name"
                               value="{{ $reservation->last_name ?? '' }}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('last_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                    <div class="mt-1">
                        <input type="email" id="email" name="email"
                               value="{{ $reservation->email ?? '' }}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('email')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="tel_number" class="block text-sm font-medium text-gray-700"> Phone
                        number
                    </label>
                    <div class="mt-1">
                        <input type="text" id="tel_number" name="tel_number"
                               value="{{ $reservation->tel_number ?? '' }}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('tel_number')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                        Date
                    </label>
                    <div class="mt-1">
                        <input type="datetime-local" id="res_date" name="res_date"
                               min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                               max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                               value="{{ $reservation ? $reservation->res_date->format('Y-m-d\TH:i:s') : ''}}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    <span class="text-xs">Working hours: 10:00-21:00.</span>
                    @error('res_date')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sm:col-span-6">
                    <div class="mt-1">
                    <input type="text" id="duration" name="duration" disabled readonly
                    value="Duration: 1hour"
                    class="block w-full appearance-none bg-grey border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>



                <div class="mt-6 p-4 flex justify-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>


            </div>


        </div>
    </div>
</div>

@endsection
