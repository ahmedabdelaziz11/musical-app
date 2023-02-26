<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['title','date','artist_id','venue_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class); 
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class); 
    }
}
