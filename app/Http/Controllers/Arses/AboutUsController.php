<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AboutUsController extends Controller {
    public function show () {

        return view('arses.about-us.show');
    }
}
