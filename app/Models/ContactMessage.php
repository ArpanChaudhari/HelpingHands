<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    // app/Models/ContactMessage.php

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
