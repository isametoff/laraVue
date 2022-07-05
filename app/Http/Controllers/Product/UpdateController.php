<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product, ColorProduct $colorProduct, ProductImage $productImage)
    {
        $data = $request->validated();
//         dd($data);

        if (isset($data['product_images']))
        {
            $productImages = $data['product_images'];;
            unset($data['product_images']);
        }
        if (isset($data['tag_id']))
        {
            $tagIds = $data['tag_id'];
            unset($data['tag_id']);
        }
        if (isset($data['color_id']))
        {
            $colorIds = $data['color_id'];
            unset($data['color_id']);
        }
        if (isset($data['preview_image']))
        {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product->update($data);

        if (isset($productImages)) {
            $productImage->where('product_id' , '=', $product->id)->delete();
            foreach ($productImages as $productImage) {
                $filePath = Storage::disk('public')->put('/images', $productImage);
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path' => $filePath,
                ]);
            }
        }
        if (isset($tagIds)) {
            $product->tags()->attach($tagIds);
        }
        if (!empty($tagIds)) {
            $product->tags()->sync($tagIds);
        } else {
            $product->tags()->detach();
        }
//        dd( $colorProduct->where('product_id' , '=', $product->id));
        if (isset($colorIds)) {
            $colorProduct->where('product_id' , '=', $product->id)->delete();
            $product->colors()->attach($colorIds);
        }
        if (!empty($colorIds)) {
            $product->colors()->sync($colorIds);
        } else {
            $product->colors()->detach();
        }



        return redirect()->route('product.index');
    }
}
