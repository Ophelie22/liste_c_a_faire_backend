# Lumen

## Installation
### Cloner le repo
```sh
git clone .....
```

### composer install (se placer dans le bon dossier !)
```php
composer install
```

### Mettre les bons droits sur les dossiers
```sh
sudo chgrp -R www-data storage
sudo chmod -R g+w storage
```

### Configuration du fichier .env
__Attention, s'il y a une erreur de syntaxe dans le fichier.env, lumen affichera une page blanche !__


### Vérifier la configuration dans bootstrap/app.php
```php
// enable facades
$app->withFacades();

// enable Eloquent ORM (model classes)
$app->withEloquent();
```


### Configuration des routes
Dans le fichier routes/web.php
Exemple de route : 
```php
$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);
```



### Création du endpoint pour lister les taches

#### Etape n°1
Création de la route dans route/web.php
```php
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'task-list'
    ]
);
```

#### Etape n°2
Création du controller TaskController dans app/Http/Controllers
```php
<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        // now we can use the Task Model
        $taskList = Task::all();
        return $this->sendJSONResponse($taskList);
    }
}
```

#### Etape n°3
Création du modèle Task dans app/Models/Task.php

```php
<?php
namespace App\Models;

// On importe le "CoreModel" de Lumen
// Ce fichier ne sera jamais éditié, il fait parti du noyau de lumen
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

}
```

____

### Sauvegarde d'une nouvelle tâche

#### Etape n°1 
Création de la route. Attention cette route est en POST car nous souhaitons créer un nouvel enregistrement.

Nouvel enregistrement (INSERT) => POST
```php
$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create',
        'as'   => 'task-create'
    ]
);
```


#### Etape n°2
Création de la bonne  méthode dans le controller app/Http/Controllers/TaskController.php

```php
    public function create(Request $request)
    {
        $task = new Task();


        $task->title = $request->input('title');
        $task->completion = $request->input('completion');
        $task->status = $request->input('status');
        $task->category_id = $request->input('categoryId');

        $task->updated_at = null;

        // insert new task into bdd
        $task->save();

        // return new task with HTTP status = 201 (201 => Created)
        return $this->sendJSONResponse($task, 201);
    }
```

```php
// create with validation
    public function createWithValidation(Request $request)
    {

        // https://lumen.laravel.com/docs/8.x/validation
        $validatedData = $this->validate($request, [
            'title' => 'required|unique:tasks|max:255',
            'completion' => 'required',
            'categoryId' => 'required',
            'status' => 'required',
        ]);

        $task = new Task();
        $task->title = $validatedData['title'];
        $task->category_id = $validatedData['categoryId'];
        $task->completion = $validatedData['completion'];
        $task->status = $validatedData['status'];

        $task->save();
        
        return $this->sendJSONResponse($task, 201);
    }
```