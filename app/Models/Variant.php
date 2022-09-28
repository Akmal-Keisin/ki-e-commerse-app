<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sizes() 
    {
        return $this->hasMany(Size::class);
    }

    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($variant) { // before delete() method call this
            $variant->sizes()->delete();
        });
    }
}
