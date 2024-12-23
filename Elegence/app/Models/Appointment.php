<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointments";
    protected $primaryKey = "App_Id"; // Matches the primary key in the migration
    protected $fillable = [
        'name',
        'email',
        'phoneNo',
        'AppDate',
        'AppTime',
        'stylist',
        'service',
        'message',
    ];
}
