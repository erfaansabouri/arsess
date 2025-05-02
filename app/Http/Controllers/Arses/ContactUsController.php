<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class ContactUsController extends Controller {
    public function show () {
        $contact_us = ContactUs::query()
                               ->firstOrFail();

        return view('arses.contact-us.show' , compact('contact_us'));
    }
}
