<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialpurchase extends Model
{
    use HasFactory;

    

    protected $fillable = ['project_type','contract_project_id','materialin_id','villa_project_id', 'meterial_id', 'quantity'];

}
