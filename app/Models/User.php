<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

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
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')
                    ->withTimestamps();
    }

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
