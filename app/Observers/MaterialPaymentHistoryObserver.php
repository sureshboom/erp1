<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\MaterialPaymentHistory;
use App\Models\Materialin;


class MaterialPaymentHistoryObserver
{
    /**
     * Handle the MaterialPaymentHistory "created" event.
     */
    public function created(MaterialPaymentHistory $materialPaymentHistory): void
    {
        //
    }

    /**
     * Handle the MaterialPaymentHistory "updated" event.
     */
    public function updated(MaterialPaymentHistory $materialPaymentHistory): void
    {
        //
        Log::info('Update event triggered');
        $originalAmount = $materialPaymentHistory->getOriginal('amount');
        $updatedAmount = $materialPaymentHistory->amount;

        // Calculate the difference
        $amountDifference = $updatedAmount - $originalAmount;

        // Update the corresponding site's paid and pending columns
        $materialin = Materialin::find($materialPaymentHistory->materialins_id);
        $materialin->paid += $amountDifference;
        $materialin->pending -= $amountDifference;
        $materialin->save();
    }

    /**
     * Handle the MaterialPaymentHistory "deleted" event.
     */
    public function deleted(MaterialPaymentHistory $materialPaymentHistory): void
    {
        //
        Log::info('Deleted event triggered');
        $materialin = Materialin::find($materialPaymentHistory->materialins_id);
        $materialin->paid -= $materialPaymentHistory->amount;
        $materialin->pending += $materialPaymentHistory->amount;
        $materialin->save();
    }

    /**
     * Handle the MaterialPaymentHistory "restored" event.
     */
    public function restored(MaterialPaymentHistory $materialPaymentHistory): void
    {
        //
    }

    /**
     * Handle the MaterialPaymentHistory "force deleted" event.
     */
    public function forceDeleted(MaterialPaymentHistory $materialPaymentHistory): void
    {
        //
    }
}
