<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Site;
use App\Models\SitePaymentHistory;

class SitePaymentHistoryObserver
{
    /**
     * Handle the SitePaymentHistory "created" event.
     */
    public function created(SitePaymentHistory $sitePaymentHistory): void
    {
        //
    }

    /**
     * Handle the SitePaymentHistory "updated" event.
     */
    public function updated(SitePaymentHistory $sitePaymentHistory): void
    {
        //
        Log::info('Update event triggered');
        $originalAmount = $sitePaymentHistory->getOriginal('amount');
        $updatedAmount = $sitePaymentHistory->amount;

        // Calculate the difference
        $amountDifference = $updatedAmount - $originalAmount;

        // Update the corresponding site's paid and pending columns
        $site = Site::find($sitePaymentHistory->site_id);
        $site->paid += $amountDifference;
        $site->pending -= $amountDifference;
        $site->save();
    }

    /**
     * Handle the SitePaymentHistory "deleted" event.
     */
    public function deleted(SitePaymentHistory $sitePaymentHistory): void
    {
        //
        Log::info('Deleted event triggered');
        $site = Site::find($sitePaymentHistory->site_id);
        $site->paid -= $sitePaymentHistory->amount;
        $site->pending += $sitePaymentHistory->amount;
        $site->save();

    }

    /**
     * Handle the SitePaymentHistory "restored" event.
     */
    public function restored(SitePaymentHistory $sitePaymentHistory): void
    {
        //
    }

    /**
     * Handle the SitePaymentHistory "force deleted" event.
     */
    public function forceDeleted(SitePaymentHistory $sitePaymentHistory): void
    {
        //
    }
}
