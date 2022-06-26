<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        // dd($data);
        if (isset($data['tag_id'])) {
            $tagIds = $data['tag_id'];
            unset($data['tag_id']);
        }
        if (isset($data['color_id'])) {
            $colorIds = $data['color_id'];
            unset($data['color_id']);
        }
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product->update($data);

        if (isset($tagIds)) {
            $product->tags()->attach($tagIds);
        }
        if (!empty($tagIds)) {
            $product->tags()->sync($tagIds);
        } else {
            $product->tags()->detach();
        }

        if (isset($colorIds)) {
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
