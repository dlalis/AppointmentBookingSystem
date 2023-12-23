@extends('layouts.app')


@section('content')
<main>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Admin Panel</span>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    View Appointments
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Edit Appointments
                </a>
            </li>
        </ul>
        <hr>
    </div>
</main>


@endsection
