<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bookings';
    protected $fillable = [
        'id',
        'payment_slip',
        'status',
        'note',
        'package_id',
        'payment_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

     public function package(){
        return $this->belongsTo(Package::class);
    }
    
    public function payment(){
        return $this->belongsTo(Payment::class);
    }

}
