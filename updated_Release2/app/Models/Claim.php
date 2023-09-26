<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims';

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'claim_type',
        'claim_description',
        'proof_of_loss_filename',
        'proof_of_loss_path',
    ];
}
