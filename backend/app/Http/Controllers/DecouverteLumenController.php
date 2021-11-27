<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use DB;

class DecouverteLumenController extends Controller
{
    public function bddSelect()
    {
        // récupération de toutes les catégories
        // Utilisation de l'objet DB pour executer des requêtes
        // DOC https://lumen.laravel.com/docs/6.x/database#basic-usage
        $categories = DB::select('SELECT * FROM `categories`');

        // nous retournons la liste des catégorie en format json
        // la méthode sendJSONResponse, se charge de retourner le bon status HTTP (par défaut statut 200 qui correspond à "Ok")
        return $this->sendJSONResponse($categories);
    }


    public function bddSelectWithModel()
    {
        // utilisation du model Category pour récupérer toutes les category
        $categories = Category::all();
        return $this->sendJSONResponse($categories);
    }

    public function bddSelectByIdWithModel()
    {
        // récupération de la catégory d'id 1
        $category = Category::find(1);
        return $this->sendJSONResponse($category);
    }

    public function bddSelectManyByIdWithModel()
    {
        // récupération dee catégories d'id 1 et 2
        $categories = Category::find([1, 2]);
        return $this->sendJSONResponse($categories);
    }

    public function bddSelectWithCustomModelQuery()
    {
        // DOC https://laravel.com/docs/6.x/eloquent#retrieving-models
        // récupération de toutes les catégorie ayant le status = 1 ; classement des résultats par "name" dans le sens descendant
        $categories =
            Category::where('status', 1)
            ->orderBy('name', 'DESC')
            ->get()
        ;
        // l'appel à la méthode get est obligatoire, c'est le fonctionnement de lumen qui nous oblige à utiliser le code de cette manière

        return $this->sendJSONResponse($categories);
    }


    public function bddSelectCourseCategory()
    {
        // DOC https://laravel.com/docs/6.x/eloquent#retrieving-models
        $categories =
            Category::where('name', 'courses')
            ->get()
        ;
        return $categories;
    }

    public function bddSelectTasksFromCategory()
    {
        $category = Category::find(1);

        // DOC : https://laravel.com/docs/6.x/eloquent-relationships#one-to-many
        // STEP pour récupérer la liste des tâches associées à une category

        // STEP : il faut appeller la propriété "tasks" (c'est comme ça ; c'est arbitraire)

        // STEP : attention , il faut dans la classe Models\Category écrire une méthode qui aura le même nom que la propriété ; dans le cas présent méthode tasks()

        $tasks = $category->tasks;
        return $this->sendJSONResponse($tasks);

    }

  public function testRequest(Request $request)
    {
        $data = $request->input();
        return $this->sendJSONResponse($data);
    }

   
}
