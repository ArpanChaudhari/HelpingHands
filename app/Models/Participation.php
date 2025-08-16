<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_id',
        'volunteer_id',
    ];
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
    public function event()
    {
        return $this->belongsTo(\App\Models\VolunteerEvent::class, 'event_id');
    }
}
