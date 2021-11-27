<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function list()
    {
        //$tasks = Task::all();
        // s'il y a une relation entre Task et autre chose, les informations ne sont
        // pas chargées automatiquement
        //$tasks = Task::all();

        // ici on force le chargement des informations des catégories liées aux tâches
        $tasks = Task::all()->load('category');

        // return tasks as JSON
        return response()->json($tasks);
    }
    /**
     * Add a task
     *
     * @return void
     */
    public function add(Request $request)
    {
        // ---- get information about the task -----
        // validate data
        // https://lumen.laravel.com/docs/8.x/validation
        // https://laravel.com/docs/7.x/validation#available-validation-rules
        // if a condition is not right, then it's like abort, the treatment will stop
        $this->validate($request, [
            // title is required, and not more than 128 characters
            'title' => 'required|string|max:128',
            // we check that the value exists in the table 'categories' for the column 'id'
            'categoryId' => 'required|integer|exists:categories,id',
            'completion' => 'required|integer|between:0,100',
            'status' => 'required|integer|between:1,2',
        ]);
        // from here, it means data is OK, validation did not see problems
        // get the information named 'title' in the JSON of the request
        $title = $request->input('title');
        $categoryId = $request->input('categoryId');
        $completion = $request->input('completion');
        $status = $request->input('status');
        // ----- add the task to the database -----
        $task = new Task();
        $task->title = $title;
        $task->category_id = $categoryId;
        $task->completion = $completion;
        $task->status = $status;
        // before writing to the database: check the data ;)
        //dump($task);
        $isSuccess = $task->save();
        // ----- status code and data -----
        if ($isSuccess) {
            // 201 : status code to indicate that something has been created
            // also return the task => useful to provide the id
            return $this->sendJsonResponse($task, 201);
        }
        // we can return a status code without content
        //abort(500);
        // or we can give additionnal information
        return $this->sendJsonResponse(['message' => 'Something went wrong with the database'], 500);
    }
    /**
     * Update a task
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        // ----- Get the task to update -----
        // findOrFail: if found the treatment goes on, otherwise the treatment
        // is aborted with a status code 404
        $taskToUpdate = Task::findOrFail($id);
        // isMethod: check if the HTTP method is the one indicated
        if ($request->isMethod('put')) {
            // ----- Validation -----
            $this->validate($request, [
                // title is required, and not more than 128 characters
                'title' => 'required|string|max:128',
                // we check that the value exists in the table 'categories' for the column 'id'
                'categoryId' => 'required|integer|exists:categories,id',
                'completion' => 'required|integer|between:0,100',
                'status' => 'required|integer|between:1,2',
            ]);
        } else {
            // ----- Validation -----
            // check that there is at least one field
            // $request->json() => get an array containing information
            // we count information
            if ($request->json()->count() === 0) {
                return $this->sendJsonResponse(['message' => 'Missing content'], 422);
            }
            // no field is required
            $this->validate($request, [
                // title is required, and not more than 128 characters
                'title' => 'string|max:128',
                // we check that the value exists in the table 'categories' for the column 'id'
                'categoryId' => 'integer|exists:categories,id',
                'completion' => 'integer|between:0,100',
                'status' => 'integer|between:1,2',
            ]);
        }
        // ----- Get data from the request, update the task and save it -----
        // is there something named 'title' in the request data
        if ($request->has('title')) {
            $taskToUpdate->title = $request->input('title');
        }
        if ($request->has('categoryId')) {
            $taskToUpdate->category_id = $request->input('categoryId');
        }
        if ($request->has('completion')) {
            $taskToUpdate->completion = $request->input('completion');
        }
        if ($request->has('status')) {
            $taskToUpdate->status = $request->input('status');
        }
        $isSuccess = $taskToUpdate->save();
        // ----- Status code -----
        if ($isSuccess) {
            $this->sendEmptyResponse(200);
        } else {
            $this->sendEmptyResponse(500);
        }
    }
}