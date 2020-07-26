<?php

namespace App\Http\Controllers;

use App\management;
use App\Model\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            redirect()->route('managements.index');
        }

        $search = management::orWhere("name", "LIKE", "%{$search%}")->get();


        return view('search.results')->with('search', $search);
    }

    public function setResults(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            redirect()->route('products.index');
        }

        $search = Product::orWhere("name", "LIKE", "%{$search%}")->get();


        return view('search.results1')->with('search', $search);
    }

}


