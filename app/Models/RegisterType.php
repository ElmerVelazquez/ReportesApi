<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterType extends Model
{
    /** @use HasFactory<\Database\Factories\RegisterTypeFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

}
