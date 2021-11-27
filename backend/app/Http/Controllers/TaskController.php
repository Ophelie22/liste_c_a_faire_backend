<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function list()
    {
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