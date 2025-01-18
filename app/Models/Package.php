<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='packages';
    protected $fillable = [
        'name',
        'price',
        'image',
        'itinerary',
        'duration',
        'inclusion',
        'exclusion',
        'destination_id',
    ];
    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
