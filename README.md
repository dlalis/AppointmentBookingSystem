# Jim Appointment

Jim Appointment is a Laravel based Appointment system. It used for a Job Interview.


## Task
Objective: Build a basic appointment booking system using Laravel within 7 calendar days.


## Features
- Register/Log in system using Laravel/ui.
- Admin users (currently applied manually and/or with seeder, change isAdmin in DB->users table)
- Admin Controller + Layouts, showing all user Reservations, allow edit/delete them.
- Users can create, list, update, and delete appointments, each appointment lasts for 1 hour.
- Check on create,update a Reservation if the time don't overlap another appointment.
- Middleware for User-Admin, plus check on Controller, protect from Unauthorized actions, like accessing other users page.
- Bootstrap 5
- Seeders: 2 users(1 Admin, 1 normal user), 10 randomly Reservations
- Default seeder password: 1 to 9

## Getting Started

### Prerequisites
- PHP 7.x or later
- Laravel 8.x or later

### Installation

1. Typical installation of Laravel plus DB connection via .env
2. php artisan migrate -> Installing all the Database migrations
3. php artisan db:seed -> Create 2 Users and 10 Reservations
4. php artisan serve -> Runs the app on localhost usually on http://127.0.0.1:8000

## Acknowledgments

- I used my own connection of Database - mysql 8.0, accessed via Navicat program.
