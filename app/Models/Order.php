<?php

namespace App\Models;

use Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [] ;
    protected $table = 'orders';
    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id', 'id');
    }
}
