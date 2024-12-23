<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users_data';

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'contactNo', 'DateOfBirth', 'email', 'password',
    ];

    // Automatically hash the password before saving to the database
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }
}
