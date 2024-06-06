<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable=[
        'mark',
        'model',
        'fuelType',
        'registration',
        'photos',
    ];

 

    public function user(){
        return $this->belongsTo(User::class,'clientId', 'id');
    }

    public function repair(){
        return $this->hasMany(Vehicle::class);
    }
}
