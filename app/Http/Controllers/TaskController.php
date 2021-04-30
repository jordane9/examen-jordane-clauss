<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('index', [
            'tasks' => \App\Models\Task::all(),
        ]);
    }

    public function show($task)
    {
      
      $task = Task::find($task);
      return view('task', [
        'task' => $task,
      ]);
  }

  public function delete($task)
  {

    $task = \App\Models\Task::find($task);
    $task -> delete();
    return view('task-deleted', [
      'task' => $task
    ]);
  }

  public function orderBy()
  {
      $task = Task::orderBy('title', 'asc')->get();
      return view('index-order', [
          'tasks' => \App\Models\Task::all(),
      ]);
  }

}
