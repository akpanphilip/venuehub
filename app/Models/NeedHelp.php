<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedHelp extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'mobile',
        'budget',
        'guests',
        'date',
        'time',
        'duration',
        'location',
        'requirement',
    ];
}
