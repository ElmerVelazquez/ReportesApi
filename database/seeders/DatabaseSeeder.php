<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Models\RegisterType;
use App\Models\EquipmentType;
use App\Models\EquipmentStatus;
use App\Models\EquipmentAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
            'name' => 'superadmin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            ]
        );
        Company::upsert([['name' => 'Concentra'],['name'=>'Innovix']],['name'],['name']);
        Role::upsert(
            [
                ['name' => 'Admin','description'=>'Usuario administrador'],
                ['name'=>'User','description'=>'Usuario regular']
            ],
            ['name'],
            ['name','description']
        );
        RegisterType::upsert(
            [
                ['name'=>'Asignación'],
                ['name'=>'Entrega']
            ],
            ['name'],
            ['name']
        );
        EquipmentType::upsert(
            [
                ['name' =>'Laptop'],
                ['name'=>'Flota'],
                ['name'=>'Mouse'],
                ['name'=>'Teclado'],
                ['name'=>'Monitor'],
                ['name'=>'Maletin'],
                ['name'=>'Chip']
            ],
            ['name'],
            ['name']
        );
        EquipmentStatus::upsert(
            [
                ['name' => 'En servicio'],
                ['name' => 'Fuera de servicio']
            ],
            ['name'],
            ['name']
        );
        EquipmentAttribute::upsert(
            [
                ['name' => 'Procesador'],
                ['name' => 'Ram'],
                ['name' => 'Disco duro'],
                ['name' => 'Color'],
                ['name' => 'Tamaño'],
            ],
            ['name'],
            ['name']
        );
    }
}
