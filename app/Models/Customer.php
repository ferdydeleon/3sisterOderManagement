<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Customer extends Model
{

     //   $fillable specific lang allow mo na save or edit
    // protected $fillable = [
    //     'name',
    //     'phone_number',
    //     'town',
    //     'barangay',
    //     'street',
    // ];

    // $guarded pag lahat gusto mo save tapos edit empy array mo lang
    protected $guarded = [] ;


    use HasFactory;
}
