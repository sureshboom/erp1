<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Materialpurchase;
use App\Models\Materialpurchasehistory;

class MaterialpurchasehistoryObserver
{
    /**
     * Handle the Materialpurchasehistory "created" event.
     */
    public function created(Materialpurchasehistory $Materialpurchasehistory): void
    {
        //
    }

    /**
     * Handle the Materialpurchasehistory "updated" event.
     */
    public function updated(Materialpurchasehistory $Materialpurchasehistory): void
    {
        //
        $oldQuantity = $Materialpurchasehistory->getOriginal('quantity');
        $newQuantity = $Materialpurchasehistory->quantity;
        $quantityDifference = $newQuantity - $oldQuantity;

        Materialpurchase::where('site_id', $Materialpurchasehistory->site_id)
            ->where('meterial_id', $Materialpurchasehistory->meterial_id)
            ->increment('quantity', $quantityDifference);
    }

    /**
     * Handle the Materialpurchasehistory "deleted" event.
     */
    public function deleted(Materialpurchasehistory $Materialpurchasehistory): void
    {
        //
        Log::info('Deleted event triggered');
        Log::info('Materialpurchasehistory ID: ' . $Materialpurchasehistory->id);
        
        $purchase = Materialpurchase::where('site_id', $Materialpurchasehistory->site_id)
                                    ->where('meterial_id', $Materialpurchasehistory->meterial_id)
                                    ->first();

        if ($purchase) {
            // Decrement the quantity in the Materialpurchases table
            $purchase->update(['quantity' => $purchase->quantity - $Materialpurchasehistory->quantity]);
        }
    }

    /**
     * Handle the Materialpurchasehistory "restored" event.
     */
    public function restored(Materialpurchasehistory $Materialpurchasehistory): void
    {
        //
    }

    /**
     * Handle the Materialpurchasehistory "force deleted" event.
     */
    public function forceDeleted(Materialpurchasehistory $Materialpurchasehistory): void
    {
        //
    }
}
