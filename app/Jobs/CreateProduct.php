<?php

namespace App\Jobs;

use App\Events\ProductCreated;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;
    private $name;
    private $price;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $product = new Product();
        $product->id = $this->id;
        $product->name = $this->name;
        $product->price = $this->price;

        $product->save();

        event(new ProductCreated($product));
    }
}
