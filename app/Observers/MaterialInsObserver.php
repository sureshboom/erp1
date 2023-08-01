<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Materialin;
use App\Models\MaterialPurchaseHistory;
use App\Models\MaterialPurchase;

class MaterialInsObserver
{
    /**
     * Handle the "deleted" event for the materialins.
     *
     * @param  \App\Models\MaterialIns  $materialIns
     * @return void
     */
    public function deleted(Materialin $materialIns)
    {
        Log::info('Deleted event triggered');
        Log::info('MaterialPurchaseHistory ID: ' . $materialIns->id);

        $materialPurchaseHistories = MaterialPurchaseHistory::where('materialin_id', $materialIns->id)->get();

        foreach ($materialPurchaseHistories as $history) {
            
            $history->delete();
        }

    }

    
}
