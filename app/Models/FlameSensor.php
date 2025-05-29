<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlameSensor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nilai_flame_sensors'];

}

