<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run (): void {
        for ( $i = 0 ; $i < 30 ; $i++ ) {
            $product = Product::query()
                              ->create([
                                           'brand_id' => 1 ,
                                           'slug' => 'p'. $i,
                                           'description' => '<p>Product description</p>' ,
                                           'price' => rand(100 , 999) * 1000 ,
                                           'summary' => 'Product summary' ,
                                           'title' => 'Product title' ,
                                       ]);
            $product->categories()
                    ->create([
                                 'title' => 'Category' . $i ,
                             ]);
            $product->productAttributes()
                    ->createMany([
                                     [ 'title' => 'attr ' . rand() ] ,
                                     [ 'title' => 'attr ' . rand() , ],
                                 ]);
        }
    }
}
