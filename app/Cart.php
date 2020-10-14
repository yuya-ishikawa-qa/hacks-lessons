<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $table = 'cart_lessons';
    protected $fillable = ['user_id' , 'lesson_id', 'quantity'];
}
