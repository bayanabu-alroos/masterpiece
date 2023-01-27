<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'name_room',
        'status',
        'image'
    ];

    public function users(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function services(){
        return $this->belongsTo(Service::class ,'service_id','id');
    }
}
