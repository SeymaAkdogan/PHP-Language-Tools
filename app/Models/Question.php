<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'Questions';
    protected $fillable = [
        'english_name',
        'serbian_name',
        'image',
    ];
}
