<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Property;
use App\Models\Booking;
use App\Policies\UserPolicy;
use App\Policies\PropertyPolicy;
use App\Policies\BookingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Property::class => PropertyPolicy::class,
        Booking::class => BookingPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
