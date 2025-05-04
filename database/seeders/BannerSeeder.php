<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run (): void {
        for ( $i = 0 ; $i < 5 ; $i++ ) {
            $banner = Banner::query()
                ->create([
                    'url' => 'https://arses.store',
                    'title' => 'test',
                         ]);
            $banner->addMediaFromUrl(asset('arses/asset/img/img01.jpg'))->toMediaCollection('image');
            $banner->addMediaFromUrl(asset('seed-storage/brand01.png'))->toMediaCollection('brand');
        }
    }
}
