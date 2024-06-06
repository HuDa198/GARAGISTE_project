<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($repair) {
            $repair->sparePart()->detach();
        });
    }
    protected $fillable=[
        'description',
        'status',
        'startDate',
        'endDate',
        'mechanicNotes',
        'clientNotes',
        'repaireCosts',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicleId');
    }
    

    public function client()
    {
        return $this->belongsTo(User::class, 'clientId');
    }
    public function mechanic()
    {
        return $this->belongsTo(User::class, 'mechanicId');
    }
    
    public function sparePart()
    {
        return $this->belongsToMany(SparePart::class, 'repair_sparepart', 'repairId', 'sparePartId');
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
