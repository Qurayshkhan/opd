<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['payment_fee', 'appointment_id', 'payment_status', 'payment_method', 'account_number'];


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
