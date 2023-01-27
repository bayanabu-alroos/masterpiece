<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
        'date_appointment',
        'start_time',
        'end_time'
    ];

    protected $table = 'appointment';


    // public function services(){
    //     return $this->belongsTo(Service::class ,'service_id','id');
    // }
    // public function users(){
    //     return $this->belongsTo(User::class ,'user_id','id');
    // }
    // public function sessions(){
    //     return $this->belongsTo(Session::class ,'sessions_id','id');
    // }

    // public function rooms(){
    //     return $this->belongsTo(Room::class ,'rooms_id','id');
    // }
}
