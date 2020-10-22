<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Jobs\CreateProduct;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    public function store(StoreProduct $request)
    {
        $id = Uuid::uuid4();
        CreateProduct::dispatch(
            $id,
            $request->get('name'),
            $request->get('price')
        );

        return $id;
    }
}
