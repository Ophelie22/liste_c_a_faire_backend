<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
class CategoryController extends Controller
{
    public function list()
    {
        // get all categories from the database
        // $categories = Category::all();
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
        // find the category with the given id
        // return null if not found
        $category = Category::find($id);

        //dump($category->tasks);

        if ($category === null) {
            Log::warning('Category not found for id ' . $id);

            // https://laravel.com/docs/8.x/errors#http-exceptions
            // we stop here, and return status code 404
            abort(404);
        }
        return response()->json($category);
    }
}