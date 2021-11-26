<?php

namespace App\Http\Controllers;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
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
    public function home()
    {
        return 'Welcome';
    }

 public function tests()
    {
        // interaction avce la bDD si je tape /tests ds mon url alors g "test method called qui apparait"
        //Simple Select
         $categories = Category ::all();
         //DB::select('SELECT * FROM `categories`');

        return $this->sendJSONResponse($categories);
    }
}
