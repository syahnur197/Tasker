<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display list of completed tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->completedTasks;
        return view('tasks.completed', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = $request->validate([
            'description' => 'required|min:3',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date'
        ]);

        auth()->user()->addTask($task);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $attribute = $request->validate([
            'description' => 'required|min:3',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date'
        ]);
        $task->update($attribute);
        return redirect('/dashboard')->with('status', 'Task Updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/dashboard')->with('status', 'Task Deleted!');;

    }

    public function start(Request $request, Task $task)
    {
        $task->start();
        return redirect('/dashboard');
    }

    public function stop(Request $request, Task $task)
    {
        $task->stop();
        return redirect('/dashboard');
    }
}
