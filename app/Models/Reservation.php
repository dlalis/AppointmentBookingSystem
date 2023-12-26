<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'tel_number',
        'res_date',
        'user_id'
    ];

    protected $dates = [
        'res_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
