<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'people',
        'package',
        'event',
        'state',
        'lga',
        'image',
        'description',
        'user_id',
        'status',
        'image2',
        'image3',
        'image4',
    ];
}
