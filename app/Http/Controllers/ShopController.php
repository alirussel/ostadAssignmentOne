<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collections;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Products;
use URL;

class ShopController extends Controller
{
    public function shopIndex() {        
        $shopId = auth()->user()->id;
        $shopName = auth()->user()->name;
        return view('shop', compact('shopId','shopName'));
    }
}
