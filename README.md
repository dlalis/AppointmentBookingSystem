# Jim Appointment

[Jim Appointment] is a [Laravel based Appointment system]. It [used for an Job Interview].

## Features

- Register/Log in system
- Admin users (currently applied manually, change isAdmin in DB->users table)
- Admin Controller + Layouts, showing all user Reservations, allow edit/delete them.
- Reservation showed in home page of each user, with edit/delete button
- Middleware for User-Admin, plus check on Controller, protect from Unauthorized actions, like accessing other user page.
- Bootstrap 5

## Getting Started

### Prerequisites
- PHP 7.x or later
- Laravel 8.x or later

### Installation

1. [Typical installation of Laravel plus DB connection via .env]
2. [php artisan migrate -> Installing all the Database migrations]
3. [php artisan serve -> Runs the app on localhost usually on http://127.0.0.1:8000]

## Acknowledgments

- [I used my own connection of Database - mysql 8.0, accessed via Navicat program.]
