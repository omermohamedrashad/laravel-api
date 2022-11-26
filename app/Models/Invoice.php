<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $attributes = [
        'customer_id' => '565'
    ];

    public function customers(){
        return $this->belongsTo(Customer::class);
    }
}
