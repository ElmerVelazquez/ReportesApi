<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\AuditObserver;
use App\Models\User;
use App\Models\Company;
use App\Models\Equipment;
use App\Models\Letter;
use App\Models\EquipmentAttribute;
use App\Models\EquipmentType;
use App\Models\EquipmentAttributeValue;
use App\Models\EquipmentStatus;
use App\Models\Register;
use App\Models\RegisterType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Auditable
        Company::observe(AuditObserver::class);
        User::observe(AuditObserver::class);
        Equipment::observe(AuditObserver::class);
        Letter::observe(AuditObserver::class);
        Register::observe(AuditObserver::class);
        RegisterType::observe(AuditObserver::class);
        EquipmentStatus::observe(AuditObserver::class);
        EquipmentType::observe(AuditObserver::class);
        EquipmentAttribute::observe(AuditObserver::class);
        EquipmentAttributeValue::observe(AuditObserver::class);
    }
}
