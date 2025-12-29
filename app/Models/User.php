<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use SoftDeletes, HasFactory, HasApiTokens, HasRoles;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
    ];
    protected $hidden = [
        'password'
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    // Relaciones

    public function registersEmisor()
    {
        return $this->hasMany(Register::class, 'emisor_id');
    }

    public function registersReceptor()
    {
        return $this->hasMany(Register::class, 'receptor_id');
    }

    public function audits()
    {
        return $this->hasMany(Audit::class);
    }

}
