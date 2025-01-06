<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    protected $table = 'packets';
    protected $fillable = ['tracking_number', 'description', 'size' , 'weight', 'destination', 'status','recipient_email'];
}
