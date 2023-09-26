<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory;

    protected $table = 'policy';

    protected $fillable = [
        'policy_number',
        'policy_type',
        'customer_name',
        'coverage_amount',
        'premium_amount',
        
    ];

    public function calculatePremium()
    {
        // Here, you can define the formula for calculating the premium amount based on the coverage amount
        // For example, let's say the premium is calculated as 10% of the coverage amount
        $premium = $this->coverage_amount * 0.1;

        // Round the premium to 2 decimal places
        $premium = round($premium, 2);

        // Set the premium amount on the policy model
        $this->premium_amount = $premium;

        // Return the premium amount
        return $premium;
    }
}
