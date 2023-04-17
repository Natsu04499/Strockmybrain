<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Services\TodoistClient;
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

    // Create task in Todoist
    $todoist = new TodoistClient(env('4d47e8030482f03f5a887c7e362b0e41574fc3f1'));
    $project_id = 2311491412; // remplacez par l'ID de votre projet Todoist
    $response = $todoist->createTask($project_id, [
        'content' => $taskname,
        'description' => $taskdescr,
        'due_date_utc' => date('Y-m-d\TH:i:s', strtotime($due_date))
    ]);


    // Check if Todoist task creation was successful
    if (isset($response['id'])) {
        $task = new Task();

        $task->name = $taskname;
        $task->description = $taskdescr;
        $task->importance = $taskimp;
        $task->creator = $u;
        $task->status = "Non Fait";
        $task->due_date = $due_date; // Save due date to database
        $task->todoist_id = $response['id']; // Save Todoist task ID to database

        $task->save();

        $workspace = Workspace::find($user_id);
        $workspace->tasks()->attach($workspaceid, ['task_id' => $task->id, 'user_id' => $user_id]);

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

        $title = $task->name." | Stock My Brain";

        return view("task.editTask", compact('title', 'task'));
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
