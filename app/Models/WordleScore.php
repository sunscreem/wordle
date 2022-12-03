<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordleScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'game_id',
    ];

    public $timestamps = false;

    protected $hidden = [
        'user_id',
    ];

}
