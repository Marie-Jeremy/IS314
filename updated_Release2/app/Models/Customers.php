<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'customer_id',
        'name',
        'username',
        'age',
        'gender',
        'birth_date',
        'marital_status',
        'phone',
        'email',
        'address',
        'password',
        'policy_number',
        'policy_type',  
        'plans',
        'description', 
    ];
}
