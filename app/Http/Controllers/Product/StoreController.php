<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//         dd($data);
        $productImages = $data['product_images'];

        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
        }
        if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
        }
        unset($data['tags'], $data['colors'], $data['product_images']);


        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $product = Product::firstOrCreate(
            [
                'title' => $data['title']
            ],
            $data
        );
        if (isset($tagsIds)) {
            foreach ($tagsIds as $tagsId) {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagsId,
                ]);
            }
        }
        // dd($colorsIds);
        if (isset($colorsIds)) {
            foreach ($colorsIds as $colorsId) {
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorsId,
                ]);
            }
        }
        if (isset($productImages)) {
            foreach ($productImages as $productImage) {
                $filePath = Storage::disk('public')->put('/images', $productImage);
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path' => $filePath,
                ]);
            }
        }


        return redirect()->route('product.index');
    }
}
