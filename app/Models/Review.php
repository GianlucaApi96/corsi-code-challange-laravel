<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string stars
 * @property string description
 * @property string employee
 */

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'stars',
        'description',
        'employee'

    ];
}
