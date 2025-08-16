<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerEvent extends Model
{
    protected $fillable = [
        'title',
        'location',
        'image',
        'application_last_date',
        'activity_start_date',
        'duration',
        'category',
        'details',
        'qualification',
        'gender',
    ];
    // app/Models/VolunteerEvent.php

    public function participants()
    {
        return $this->hasMany(\App\Models\Participation::class, 'event_id');
    }
}
