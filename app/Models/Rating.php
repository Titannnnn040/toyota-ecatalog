<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'm_rating';

    protected $fillable = [
        'name',
        'asal',
        'image',
        'rating'
    ];
}
