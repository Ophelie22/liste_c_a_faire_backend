<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function list()
    { // $categories = Category::all();

        // get active categories from the database, ordered by name
        // https://laravel.com/docs/8.x/queries
        $categories = Category::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();

        // return categories as JSON
        return response()->json($categories);
    }
    public function item($id)
    {
        // write an information in the logs
        Log::info('Get information for category with id ' . $id);
        $categoriesList = [
            1 => [
              'id' => 1,
              'name' => 'Chemin vers O\'clock',
              'status' => 1
            ],
            2 => [
              'id' => 2,
              'name' => 'Courses',
              'status' => 1
            ],
            3 => [
              'id' => 3,
              'name' => 'O\'clock',
              'status' => 1
            ],
            4 => [
              'id' => 4,
              'name' => 'Titre Professionnel',
              'status' => 1
            ]
        ];
        if (!isset($categoriesList[$id])) {
            Log::warning('Category not found for id ' . $id);
            // https://laravel.com/docs/8.x/errors#http-exceptions
            // we stop here, and return status code 404
            abort(404);
        }
        // get category with the given id
        $category = $categoriesList[$id];
        return response()->json($category);
    }
}