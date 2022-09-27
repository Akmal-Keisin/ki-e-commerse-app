<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function variants() {
        return $this->hasMany(Variant::class);
    }

    public function imageSliders() {
        return $this->hasMany(imageSlider::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
            foreach ($product->imageSliders()->get() as $imageSlider) {
                Storage::disk('public')->delete($imageSlider->image);
            }

            $product->imageSliders()->delete();
            foreach ($product->variants()->get() as $variant) {
                Storage::disk('public')->delete($variant->image);
            }
            $product->variants()->delete();
        });
    }
}
