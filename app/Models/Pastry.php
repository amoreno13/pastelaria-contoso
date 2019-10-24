<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastry extends Model 
{    
    use SoftDeletes;      

    protected $table = 'pastels';
    protected $appends = ['full_image'];

    protected $fillable = [
        'name', 
        'price', 
        'image', 
    ];

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function getFullImageAttribute(){
        return asset(config('settings.pastryImgPath')) . '/' . $this->image;
    }
}