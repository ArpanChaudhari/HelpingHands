<?php

// app/Models/ExploreCampaign.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExploreCampaign extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'goal_amount',
        'amount_raised', 'backers', 'category', 'slug',
    ];

    protected $appends = ['progress'];

    public function getProgressAttribute()
    {
        return $this->goal_amount > 0
            ? round(($this->amount_raised / $this->goal_amount) * 100)
            : 0;
    }
}

