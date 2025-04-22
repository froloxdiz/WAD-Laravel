<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'movies';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'title',
        'genre',
        'release_year',
        'description',
    ];

}
