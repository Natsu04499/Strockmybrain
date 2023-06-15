<?php

namespace App\Http\Controllers;

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
            "name" => "required",
            "description" => "required",
            "importance" => "required",
            "due_date" => "required|date"
        ]);

        $taskname = $request->input("name");
        $taskdescr = $request->input("description");
        $due_date = $request->input("due_date");
        $taskimp = $request->input("importance");

        $usern = Auth::user();
        $u = $usern->name;

        $new_task = new Task();
        $new_task->name = $taskname;
        $new_task->description = $taskdescr;
        $new_task->importance = $taskimp;
        $new_task->creator = $u;
        $new_task->status = "Non Fait";
        $new_task->due_date = $due_date;
        $new_task->save();

        $user_id = Auth::id();
        $workspace = Workspace::find($user_id);
        $workspace->tasks()->attach($workspaceid, ['task_id' => $new_task->id, 'user_id' => $user_id]);

        return back()->with('success', 'Tâche créée avec succès.');
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        return back();
    }

    public function editTask($id)
    {
        $title = 'edit';
        $task = Task::find($id);
        return view("task.editTask", compact("task","title"));
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
            "taskStatus" => "required"
        ]);
        $taskStatus = $request->input("taskStatus");
        $task->status = $taskStatus;
        $task->save();
        return back();
    }
}
