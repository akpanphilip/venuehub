<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventServiceList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'eventservice',
        'budget',
        'capacity',
        'description',
        'h1',
        'h2',
        'h3',
        'image',
        'status',
        'user_id',
    ];
}
