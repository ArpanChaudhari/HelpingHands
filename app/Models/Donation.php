<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Donation extends Model
{
    protected $fillable = [
        'campaign_id',
        'campaign_type',
        'donor_id',
        'name',
        'email',
        'phone',
        'nationality',
        'amount',
    ];

    public function campaign()
    {
        if ($this->campaign_type === 'explore') {
            return $this->belongsTo(ExploreCampaign::class, 'campaign_id');
        }
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
