<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;

#[UseResource(ApiResource::class)]
class Equipment extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentFactory> */
    use HasFactory;

    protected $fillable = [
        'equipment_type_id',
        'brand',
        'model',
        'serial',
        'equipment_status_id',
        'comment',
    ];
    protected $hidden = ['pivot'];
    public function type()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id');
    }

    public function status()
    {
        return $this->belongsTo(EquipmentStatus::class, 'equipment_status_id');
    }

    public function attributeValues()
    {
        return $this->hasMany(EquipmentAttributeValue::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

}
