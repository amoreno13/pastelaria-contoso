<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model 
{    
    use SoftDeletes;   
    
    protected $fillable = ['customer_id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function pastels() {
        return $this->belongsToMany(Pastry::class)->withPivot(['amount']);
    }
}