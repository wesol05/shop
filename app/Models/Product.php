<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'price',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->{$product->getKeyName()} = (string) Uuid::uuid4();
        });
    }
}
