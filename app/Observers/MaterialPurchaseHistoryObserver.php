<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\MaterialPurchase;
use App\Models\MaterialPurchaseHistory;

class MaterialPurchaseHistoryObserver
{
    /**
     * Handle the MaterialPurchaseHistory "created" event.
     */
    public function created(MaterialPurchaseHistory $materialPurchaseHistory): void
    {
        //
    }

    /**
     * Handle the MaterialPurchaseHistory "updated" event.
     */
    public function updated(MaterialPurchaseHistory $materialPurchaseHistory): void
    {
        //
        $oldQuantity = $materialPurchaseHistory->getOriginal('quantity');
        $newQuantity = $materialPurchaseHistory->quantity;
        $quantityDifference = $newQuantity - $oldQuantity;

        MaterialPurchase::where('site_id', $materialPurchaseHistory->site_id)
            ->where('meterial_id', $materialPurchaseHistory->meterial_id)
            ->increment('quantity', $quantityDifference);
    }

    /**
     * Handle the MaterialPurchaseHistory "deleted" event.
     */
    public function deleted(MaterialPurchaseHistory $materialPurchaseHistory): void
    {
        //
        Log::info('Deleted event triggered');
        Log::info('MaterialPurchaseHistory ID: ' . $materialPurchaseHistory->id);
        
        $purchase = MaterialPurchase::where('site_id', $materialPurchaseHistory->site_id)
                                    ->where('meterial_id', $materialPurchaseHistory->meterial_id)
                                    ->first();

        if ($purchase) {
            // Decrement the quantity in the materialpurchases table
            $purchase->update(['quantity' => $purchase->quantity - $materialPurchaseHistory->quantity]);
        }
    }

    /**
     * Handle the MaterialPurchaseHistory "restored" event.
     */
    public function restored(MaterialPurchaseHistory $materialPurchaseHistory): void
    {
        //
    }

    /**
     * Handle the MaterialPurchaseHistory "force deleted" event.
     */
    public function forceDeleted(MaterialPurchaseHistory $materialPurchaseHistory): void
    {
        //
    }
}
