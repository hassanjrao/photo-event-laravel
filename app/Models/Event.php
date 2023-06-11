<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ["event_date", "event_time"];

    public function eventHosts()
    {
        return $this->hasMany(EventHost::class);
    }

    public function eventImages()
    {
        return $this->hasMany(EventImage::class);
    }

    public function getEventDateAttribute()
    {
        $dateTimeArr = explode(" ", $this->start_date);

        return $dateTimeArr[0];
    }


    public function getEventTimeAttribute()
    {
        $dateTimeArr = explode(" ", $this->start_date);

        return $dateTimeArr[1];
    }
}
