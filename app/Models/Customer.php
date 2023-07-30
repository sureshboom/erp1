<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Customer extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        
        'customer_name',
        'phone',
        'location',
        'interested_project',
        'interested_area',
        'source',
        'feedback',
        'created_by_id',
        'created_by_type'
    ];
    

    public function site()
    {
        // Assuming the foreign key in "sites" table is "customer_id"
        return $this->belongsTo(Site::class, 'owner_id','id');
    }

    

    

    public function telecaller(){
        
            return $this->belongsTo(Telecaller::class,'created_by_id');
        
        
    }
    public function salesperson(){
        return $this->belongsTo(Salesperson::class,'created_by_id');
    }
    
    
    
}
