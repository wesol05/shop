<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, LogsActivity;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'price',
    ];

    protected static $logAttributes = ['name', 'price'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->{$product->getKeyName()} = (string) Uuid::uuid4();
        });
    }
}
