<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;
    protected $fillable = [
        'event',
    ];
    /**
     * Get the event service for the event service type.
     */
    public function event_service_lists()
    {
        return $this->hasMany(EventServiceList::class);
    }
}
