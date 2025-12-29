<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

}
