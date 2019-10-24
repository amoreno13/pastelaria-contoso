<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model 
{    
    use SoftDeletes;   
    
    protected $fillable = ['customer_id'];
    protected $appends = ['value'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function pastels() {
        return $this->belongsToMany(Pastry::class)->withPivot(['amount']);
    }

    public function getValueAttribute(){
        return $this->pastels()->sum(DB::raw('amount * price'));
    }
}