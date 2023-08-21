<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Materialpurchase;
use App\Models\Materialpurchasehistory;
use App\Models\Materialin;

class MaterialpurchasehistoryObserver
{
    /**
     * Handle the Materialpurchasehistory "created" event.
     */
    
    public function deleted(Materialpurchasehistory $purchaseHistory): void
    {
        //
        Log::info('Deleted event triggered');
        Log::info('Materialpurchasehistory ID: ' . $purchaseHistory->id);
        $projectType = $purchaseHistory->project_type;
        $projectId = $projectType === 'contract' ? $purchaseHistory->contract_project_id : $purchaseHistory->villa_project_id;
        $materialId = $purchaseHistory->meterial_id;
        $quantity = $purchaseHistory->quantity;

        $materialPurchase = MaterialPurchase::where('project_type', $projectType)
            ->where($projectType . '_project_id', $projectId)
            ->where('meterial_id', $materialId)
            ->first();

        if ($materialPurchase) {
            $materialPurchase->decrement('quantity', $quantity);
        }
    }
    
}
