<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|integer|min:1|max:999999',
            'name' => 'required|unique:products'
        ]);

        if ($validator->fails()) {
            return new JsonResponse($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = new Product();
        $product->fill($request->only([
            'price',
            'name',
        ]));

        $product->save();

        return new JsonResponse(
            new ProductResource($product),
            Response::HTTP_CREATED
        );
    }
}
