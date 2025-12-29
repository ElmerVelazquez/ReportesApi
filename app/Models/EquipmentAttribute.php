<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class EquipmentAttribute extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentAttributeFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['pivot'];

    public function attributeValues()
    {
        return $this->hasMany(EquipmentAttribute::class);
    }
    public function equipmentType()
    {
        return $this->belongsToMany(EquipmentType::class, 'equipment_attribute_equipment_type')
                    ->withTimestamps();
    }

}

