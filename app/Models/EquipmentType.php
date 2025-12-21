<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentTypeFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(EquipmentAttribute::class, 'equipment_attribute_equipment_type')
                    ->withTimestamps();
    }


}
