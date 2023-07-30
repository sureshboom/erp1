<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function site()
    {
        // Assuming the foreign key in "sites" table is "customer_id"
        return $this->belongsTo(Site::class, 'owner_id','id');
    }
}
