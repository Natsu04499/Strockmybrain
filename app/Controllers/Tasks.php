<?php

namespace App\Http\Controllers;

use App\Services\TodoistClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;

class Tasks extends Controller
{

    public function createTask(Request $request, $workspaceid)
{
    $request->validate([
        "name"=>"required",
        "description"=>"required",
        "importance"=>"required",
        "due_date"=>"required|date"
    ]);
    $user_id = Auth::id();
    $usern = Auth::user();
    $u = $usern->name;

    $taskname = $request->input("name");
    $taskdescr = $request->input("description");
    $due_date = $request->input("due_date");
    $taskimp = $request->input("importance");

    $task = [
        'content' => $taskname,
        'project_id' => config('todoist.project_id'),
        'description' => $taskdescr,
        'due_date_utc' => date('Y-m-d\TH:i:s', strtotime($due_date))
    ];

    $todoist = new TodoistClient(config('todoist.api_key'));
    $response = $todoist->createTask(config('todoist.project_id'), $task);

    if (isset($response['id'])) {
        $new_task = new Task();
        $new_task->name = $taskname;
        $new_task->description = $taskdescr;
        $new_task->importance = $taskimp;
        $new_task->creator = $u;
        $new_task->status = "Non Fait";
        $new_task->due_date = $due_date;
        $new_task->todoist_id = $response['id'];
        $new_task->save();

        $workspace = Workspace::find($user_id);
        $workspace->tasks()->attach($workspaceid, ['task_id' => $new_task->id, 'user_id' => $user_id]);

        return back()->with('success', 'Tâche créée avec succès.');
    } else {
        return back()->with('error', 'Impossible de créer la tâche. Veuillez réessayer plus tard.');
    }
}




    public function deleteTask($id) 
    {

        $task = Task::find($id);

        $task->delete();

        return back();
    }

    public function editTask($id) 
    {

        $task = Task::find($id);

        return view("task.editTask", compact("task"));
    }

    public function postEditTask(Request $request, $id)
    {
        $task = Task::find($id);
        
        $task->name = $request->input("name");
        $task->description = $request->input("description");
        $task->importance = $request->input("importance");
        $task->save();

        return back();
    }

    public function changeTaskStatus(Request $request, $id)
    {
        $task = Task::find($id);

        $request->validate([
            "taskStatus"=>"required"
        ]);

        $taskStatus = $request->input("taskStatus");

        $task->status = $taskStatus;
        $task->save();

        return back();
    }
}
