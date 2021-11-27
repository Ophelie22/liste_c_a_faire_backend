<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list()
    {
        // now we can use the Category Model
        $categoriesList = Category::all();

        return $this->sendJSONResponse($categoriesList);
    }

    public function item($categoryId)
    {
        $category = Category::find($categoryId);
        //check if the asked category exists
        if ($category !== null) {
            return $this->sendJSONResponse($category);
        } else {
            abort(404);
        }
    }
//
}