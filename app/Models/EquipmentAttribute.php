<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentAttribute extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentAttributeFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function values()
    {
        return $this->hasMany(EquipmentAttributeValue::class);
    }
    public function equipmentType()
    {
        return $this->belongsToMany(EquipmentType::class, 'equipment_attribute_equipment_type')
                    ->withTimestamps();
    }

}
