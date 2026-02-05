<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use App\Http\Resources\ApiResource;


#[UseResource(ApiResource::class)]
class Register extends Model
{
    /** @use HasFactory<\Database\Factories\RegisterFactory> */
    use HasFactory;

    protected $fillable = [
        'type_register_id',
        'company_id',
        'equipment_id',
        'emisor_id',
        'receptor_id',
        'comment',
    ];

    public function type()
    {
        return $this->belongsTo(RegisterType::class, 'type_register_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function emisor()
    {
        return $this->belongsTo(Employee::class, 'emisor_id');
    }

    public function receptor()
    {
        return $this->belongsTo(Employee::class, 'receptor_id');
    }

    public function letters()
    {
        return $this->hasOne(Letter::class);
    }

}
