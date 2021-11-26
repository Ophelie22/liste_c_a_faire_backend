<?php

namespace App\Http\Controllers;
use DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home()
    {
        echo 'Welcome';
    }

 public function tests()
    {
        // interaction avce la bDD si je tape /tests ds mon url alors g "test method called qui apparait"
        //Simple Select
         $categories = DB::select('SELECT * FROM `categories`');

        return 'test method called';
    }
}
