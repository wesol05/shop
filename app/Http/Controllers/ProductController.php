<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Resources\ProductResource;
use App\Models\Product as ProductModel;
use App\Jobs\CreateProduct;
use Ramsey\Uuid\Uuid;
use Spatie\ResourceLinks\LinkResource;
use Spatie\ResourceLinks\LinkResourceType;

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

        return [
            'links' => LinkResource::create(null, LinkResourceType::ITEM)->link(self::class, ['product' => $id]),
        ];
    }

    public function show(ProductModel $product)
    {
        return new ProductResource($product);
    }
}
