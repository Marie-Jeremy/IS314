<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradeRequest extends Model
{
    protected $table = 'upgrade_requests';

    protected $fillable = [
        'policy_number',
        'policy_type',
        'premium_amount',
        'plans',
        'customer_id',
        'name',
        'email',
    ];

    public function customer()
{
    return $this->belongsTo(Customers::class, 'customer_id');
}
}
