<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentAttributeValue extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentAttributeValueFactory> */
    use HasFactory;
    
    protected $fillable = [
        'equipment_id',
        'equipment_attribute_id',
        'value',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function attribute()
    {
        return $this->belongsTo(EquipmentAttribute::class, 'equipment_attribute_id');
    }

}
