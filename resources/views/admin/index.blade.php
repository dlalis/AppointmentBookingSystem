@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div style="padding-left: 10%;" class="align-content-center">
                    <div style="text-align: center;">
                        <h1>All Reservations!</h1>
                        <hr>

                    </div>




                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                                            <table class="min-w-full">
                                                <thead class="bg-gray-50 dark:bg-gray-700">
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        Email
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        Number
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $reservation->first_name }} {{ $reservation->last_name }}
                                                        </td>
                                                        <td
                                                            class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $reservation->email }}
                                                        </td>
                                                        <td
                                                            class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $reservation->res_date }}
                                                        </td>
                                                        <td
                                                            class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $reservation->tel_number }}
                                                        </td>
                                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                            <div class="flex space-x-2">

                                                                <form method="POST" action="{{ route('admin.edit', ['user' => $user->id, 'reservation' => $reservation->id]) }}"
                                                                      class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="GET">
                                                                    <button type="submit">Edit</button>
                                                                </form>

                                                                <form method="POST"
                                                                      action="{{ url(auth()->user()->id.'/admin/destroy' , $reservation->id) }}"
                                                                      class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                                      onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                                </tbody>

                                            </table>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>

            </div>

        </div>
    </div>
@endsection
