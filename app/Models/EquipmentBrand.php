<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;

#[UseResource(ApiResource::class)]
class EquipmentBrand extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentBrandFactory> */
    use HasFactory;
    protected $fillable = ['name'];

    public function models()
    {
        return $this->hasMany(EquipmentModel::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

}
