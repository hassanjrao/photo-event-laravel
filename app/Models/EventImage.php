<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventImage extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function uploadedBy(){
        return $this->belongsTo(User::class,"uploaded_by","id");
    }

    public function users(){
        return $this->belongsToMany(User::class,"event_image_user","event_image_id","user_id");
    }

    

}
