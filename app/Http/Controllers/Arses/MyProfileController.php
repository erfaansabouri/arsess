<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductCategory;

class MyProfileController extends Controller {
    public function show () {
        $user = auth()->user();

        $invoices = Invoice::query()
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('arses.my-profile.show', compact('invoices', 'user'));
    }

    public function logout () {
        auth()->logout();
        return redirect()->route('home')->with('custom_success', 'خروج با موفقیت انجام شد');
    }

    public function update () {
        $user = auth()->user();
        $data = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'address' => 'nullable|string',
        ]);

        $user->update($data);


        return response()->json([
            'status' => 'success',
                                ]);
    }
}
