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

        $users = management::orWhere("name", "LIKE", "%$search%")->get();


        return view('search.results')->with('users', $users);
    }

    public function setResults(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            redirect()->route('products.index');
        }

        $users = Product::orWhere("name", "LIKE", "%$search%")->get();


        return view('search.results1')->with('users', $users);
    }

}


