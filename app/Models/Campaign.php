<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'amount_raised',
        'goal_amount',
        'progress',
        'backers'
    ];
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
