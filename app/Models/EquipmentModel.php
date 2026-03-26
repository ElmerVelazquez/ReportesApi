<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;

#[UseResource(ApiResource::class)]
class EquipmentModel extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentModelFactory> */
    use HasFactory;
    protected $fillable = ['name','equipment_brand_id'];

    public function brand()
    {
        return $this->belongsTo(EquipmentBrand::class, 'equipment_brand_id');
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

}
