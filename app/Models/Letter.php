<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class Letter extends Model
{
    /** @use HasFactory<\Database\Factories\LetterFactory> */
    use HasFactory;

    protected $fillable = [
        'register_id',
        'date',
    ];

    public function register()
    {
        return $this->belongsTo(Register::class);
    }

}
