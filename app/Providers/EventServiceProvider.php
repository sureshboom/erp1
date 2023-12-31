<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Materialpurchasehistory;
use App\Models\Materialin;
use App\Observers\MaterialPurchaseHistoryObserver;
use App\Observers\MaterialInsObserver;

use App\Observers\MaterialPaymentHistoryObserver;
use App\Models\MaterialPaymentHistory;
use App\Observers\LandPaymentHistoryObserver;
use App\Models\LandCustomer;
use App\Models\LandPaymentHistory;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
        // Materialpurchasehistory::observe(MaterialPurchaseHistoryObserver::class);
        // Materialin::observe(MaterialInsObserver::class);
        // SitePaymentHistory::observe(SitePaymentHistoryObserver::class);
        // MaterialPaymentHistory::observe(MaterialPaymentHistoryObserver::class);
        // LandPaymentHistory::observe(LandPaymentHistoryObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
