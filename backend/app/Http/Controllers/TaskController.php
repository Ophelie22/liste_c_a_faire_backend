<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function list()
    {
       $tasks = Task::all();
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
        // get information about the task
        // validate data
        // https://laravel.com/docs/7.x/validation#quick-writing-the-validation-logic
        // if a condition is not right, then it's like abort, the treatment will stop
        $this->validate($request, [
            // title is required, and not more than 128 characters
            'title' => 'required|string|max:128',
            'categoryId' => 'required|integer',
            'completion' => 'required|integer|between:0,100',
            'status' => 'required|integer|between:1,2',
        ]);
        // from here, it means data is OK, validation did not see problems

        // get the information named 'title' in the JSON of the request
        $title = $request->input('title');
        $categoryId = $request->input('categoryId');
        $completion = $request->input('completion');
        $status = $request->input('status');

        // add the task to the database
        $task = new Task();
        $task->title = $title;
        $task->category_id = $categoryId;
        $task->completion = $completion;
        $task->status = $status;

        // before writing to the database: check the data ;)
        //dump($task);
    $isSuccess = $task->save();

        if (!$isSuccess) {
            // 201 : status code to indicate that something has been created
            // also return the task => useful to provide the id
           return $this->sendJsonResponse($task, 201);
        }

    // we can return a status code without content
        //abort(500);
        // or we can give additionnal information
         return $this->sendJsonResponse(['message' => 'Something went wrong with the database'], 500);
    }
}