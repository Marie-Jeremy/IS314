<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Get_premium extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'birth_date',
        'marital_status',
        'phone',
        'address',
        'email',
        'policy_type',
        'policy_duration',
        'destination'
    ];
}
