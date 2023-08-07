<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\LandCustomer;
use App\Models\LandPaymentHistory;

class LandPaymentHistoryObserver
{
    /**
     * Handle the LandPaymentHistory "created" event.
     */
    public function created(LandPaymentHistory $landPaymentHistory): void
    {
        //
    }

    /**
     * Handle the LandPaymentHistory "updated" event.
     */
    public function updated(LandPaymentHistory $landPaymentHistory): void
    {
        //
        Log::info('Update event triggered');
        $originalAmount = $landPaymentHistory->getOriginal('amount');
        $updatedAmount = $landPaymentHistory->amount;

        // Calculate the difference
        $amountDifference = $updatedAmount - $originalAmount;

        // Update the corresponding site's paid and pending columns
        $land = LandCustomer::find($landPaymentHistory->landcustomers_id);
        $land->paid += $amountDifference;
        $land->pending -= $amountDifference;
        $land->save();
    }

    /**
     * Handle the LandPaymentHistory "deleted" event.
     */
    public function deleted(LandPaymentHistory $landPaymentHistory): void
    {
        //
        Log::info('Deleted event triggered');
        $land = LandCustomer::find($landPaymentHistory->landcustomers_id);
        $land->paid -= $landPaymentHistory->amount;
        $land->pending += $landPaymentHistory->amount;
        $land->save();
    }

    /**
     * Handle the LandPaymentHistory "restored" event.
     */
    public function restored(LandPaymentHistory $landPaymentHistory): void
    {
        //
    }

    /**
     * Handle the LandPaymentHistory "force deleted" event.
     */
    public function forceDeleted(LandPaymentHistory $landPaymentHistory): void
    {
        //
    }
}
