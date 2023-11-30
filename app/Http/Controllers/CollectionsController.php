<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collections;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Products;
//use URL;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\RedirectResponse;

class CollectionsController extends Controller
{
    public function collectionsIndex(Request $request) {
        //check if it is a POST request
        if ($request->isMethod('post')) {


            $collectionid = $request->collectionid;
            if ($collectionid != 0) {
                $collection = Collections::find($collectionid);
            } else {
                $collection = new Collections();
            }

            $collection->name = $request->name;
            $collection->description = $request->description;
            $collection->shop_id = auth()->user()->id;
            $collection->status = 1;

            $collection->save();
            $redirectUrl = getRedirectRoute('collections.index');
            return redirect($redirectUrl);

            //return redirect()->route('collections.index');
            
        }

       
        $collections = Collections::where('shop_id', auth()->user()->id)->get();
        return view('collections.index', compact('collections'));
    }
}
