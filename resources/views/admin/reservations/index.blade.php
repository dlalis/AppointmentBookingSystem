@extends('layouts.app')


@section('content')

<div style="display: flex;">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Admin Panel</span>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.admin') }}" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reservations.index') }}" class="nav-link active" aria-current="page">
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

    <div style="padding-left: 15%;" class="align-content-center">
        <form>
            <div class="mb-3">
                <label for="name1" class="form-label">First Name</label>
                <input type="email" class="form-control" id="name1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="lastname1" class="form-label">Last Name</label>
                <input type="email" class="form-control" id="lastname1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="number1" class="form-label">Phone Number</label>
                <input type="email" class="form-control" id="number1" aria-describedby="emailHelp">
            </div>

            <input class="form-control" type="text" value="Duration: 1hour" aria-label="Disabled input example" disabled readonly>

            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
