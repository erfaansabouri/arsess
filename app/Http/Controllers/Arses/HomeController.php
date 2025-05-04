<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ContactUs;

class HomeController extends Controller {
    public function index () {
        $banners = Banner::query()->get();
        return view('arses.home.index', compact('banners'));
    }
}
