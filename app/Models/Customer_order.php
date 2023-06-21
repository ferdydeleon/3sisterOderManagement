<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_order extends Model
{
    protected $guarded = [] ;
    protected $table = 'customer_orders';
    use HasFactory;
}
