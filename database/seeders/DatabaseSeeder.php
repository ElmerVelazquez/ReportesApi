<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\RegisterType;
use App\Models\EquipmentType;
use App\Models\EquipmentStatus;
use App\Models\EquipmentAttribute;
use App\Models\EquipmentBrand;
use App\Models\EquipmentModel;
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
        Company::upsert(
            [
                ['name' => 'Concentra'],
                ['name'=>'Innovix']
            ],
            ['name'],
            ['name']
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
        EquipmentBrand::upsert(
            [
                ['name' => 'Dell'],
                ['name' => 'HP'],
            ],
            ['name'],
            ['name']
        );
        EquipmentModel::upsert(
            [
                ['name' => 'Latitude','equipment_brand_id'=>'1'],
                ['name' => 'Elite', 'equipment_brand_id'=>'2'],
            ],
            ['name','equipment_brand_id'],
            ['name','equipment_brand_id']
        );

    }
}
