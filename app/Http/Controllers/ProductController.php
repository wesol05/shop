<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(StoreProduct $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return new ProductResource($product);
    }
}
