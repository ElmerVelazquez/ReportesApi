<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class EquipmentStatus extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentStatusFactory> */
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

}
