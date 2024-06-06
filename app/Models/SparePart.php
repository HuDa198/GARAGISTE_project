<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    
    use HasFactory;
    
    protected $table = 'spare_parts';
    protected $fillable=[
        'partName',
        'partReference',
        'supplier',
        'price'
    ];

    public function repair()
{
    return $this->belongsToMany(Repair::class, 'repair_sparepart', 'sparePartId', 'repairId');
}


}