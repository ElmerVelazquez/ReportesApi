<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentFactory> */
    use HasFactory;

    protected $fillable = [
        'type_equipment_id',
        'brand',
        'model',
        'serial',
        'equipment_status_id',
        'comment',
    ];

    public function type()
    {
        return $this->belongsTo(EquipmentType::class, 'type_equipment_id');
    }

    public function status()
    {
        return $this->belongsTo(EquipmentStatus::class, 'equipment_status_id');
    }

    public function attributes()
    {
        return $this->hasMany(EquipmentAttributeValue::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

}
