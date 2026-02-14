<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;
    protected $table = 'm_car_category';
    protected $fillable = [
        'name'
    ];
}
