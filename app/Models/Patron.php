<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    use HasFactory;

    protected $table = 'patrons';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'birthday', 'sex', 'house_no', 'street', 'barangay', 'city', 'province', 'zip', 'phone_number', 'secondary_phone', 'other_phone', 'email', 'secondary_email', 'primary_contact', 'card_number', 'college', 'course', 'registration_date', 'expiry_date'
    ];
}
