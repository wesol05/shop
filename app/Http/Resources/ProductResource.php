<?php

namespace App\Http\Resources;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;

class ProductResource extends JsonResource
{
    use HasLinks;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'links' => $this->links(ProductController::class),
        ];
    }

    public static function collection($resource)
    {
        return parent::collection($resource)->additional([
            'meta' => [
                'links' => self::collectionLinks(ProductController::class),
            ]
        ]);
    }
}
