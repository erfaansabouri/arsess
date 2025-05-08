<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;

class ProductCategoryController extends Controller {
    public function show ( $slug ) {
        $category = ProductCategory::query()
                                   ->where('slug' , $slug)
                                   ->firstOrFail();
        $related_categories = ProductCategory::query()
                                             ->whereIn('id' , ProductCategory::getMyParentAndSiblingAndChildrenIds($category))
                                             ->orderBy('parent_id')
                                             ->get();
        $products = Product::query()
                           ->whereHas('categories' , function ( $query ) use ( $category ) {
                               $query->where('product_categories.id' , $category->id);
                           })
                           ->when(!$category->parent , function ( Builder $query ) use ($related_categories){
                               $query->whereHas('categories' , function ( Builder $query ) use ($related_categories) {
                                   $query->whereIn('product_categories.id'  , $related_categories->pluck('id')->toArray());
                               });
                           })
                           ->get();

        return view('arses.product-categories.show' , compact('category' , 'related_categories' , 'products'));
    }
}
