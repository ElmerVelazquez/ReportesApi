<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use Illuminate\Database\Eloquent\Attributes\UseResourceCollection;
use App\Http\Resources\ApiResource;

#[UseResource(ApiResource::class)]
class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'job_title',
        'status',
    ];
    protected $attributes = [
        'status' => 'active',
    ];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
