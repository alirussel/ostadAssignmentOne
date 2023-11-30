<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Products;
use URL;

class ProductsController extends Controller
{
    function products(Request $request, $collectionid) {
        //get PRODUCTS for a collection
        //check if this collection id belongs to shop id
        $collection = Collections::findOrFail($collectionid);
        $shop = $request->user();
        if ($collection->shop_id != $request->user()->id) {
            return Redirect::tokenRedirect('collections.index');
        }

        if ($request->isMethod('post')) {
            $productid = $request->productid;
            if ($productid != 0) {
                $product = Products::find($productid);
            } else {
                $product = new Products();
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->collection_id = $collection->id;
            $product->shop_id = $shop->id;
            $product->status = 1;

            $product->save();

            $redirectUrl = getRedirectRoute('collections.products', ['collectionid' => $collection->id]);
            return redirect($redirectUrl);

        }

        $product = Products::where('collection_id', $collection->id)->get();
        return view('collections.products', compact('product', 'collection'));
    }
}
