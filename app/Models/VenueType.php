<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueType extends Model
{
    use HasFactory;
    protected $fillable = [
        'venue_type',
    ];

    /**
     * Get the listings for the venue type.
     */
    public function listings()
    {
        return $this->hasMany(Listings::class);
    }
}
