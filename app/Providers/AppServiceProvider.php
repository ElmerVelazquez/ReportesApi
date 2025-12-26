<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        Role::observe(AuditObserver::class);
        EquipmentStatus::observe(AuditObserver::class);
        EquipmentType::observe(AuditObserver::class);
        EquipmentAttribute::observe(AuditObserver::class);
        EquipmentAttributeValue::observe(AuditObserver::class);
    }
}
