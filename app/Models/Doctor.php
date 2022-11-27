<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }



    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-M-Y');
    // }
}
