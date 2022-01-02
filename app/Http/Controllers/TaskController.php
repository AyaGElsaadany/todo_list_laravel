<?php

namespace App\Http\Controllers;

use App\Task;
use App\Task_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::latest()->paginate(4);
        $lists = Task_list::where('user_id', Auth::id())->with('tasks')->latest()->paginate(4);
        //dd($lists->toArray());
        return view('Task.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = Task_list::latest()->paginate(4);
        // dd($lists);
        return view('Task.create', compact('lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'list_id' => 'required',
            'title' => 'required',
            'due_date' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $task = Task::create($request->all());
        return redirect()->route('tasks.index')
                        ->with('success', 'Task is created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //$list = Task_list::where('id', $task->list_id)->first();
        //dd($task->list->toArray());
        return view('Task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $lists = Task_list::where('user_id', Auth::id())->latest()->paginate(4);
        return view('Task.edit', compact('task', 'lists'));
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
        $request->validate([
            'list_id' => 'required',
            'title' => 'required',
            'due_date' => 'required',
            'status' => 'required'
        ]);
        //$task = Task::where('id', $request->id)->update($request->all());
        $task->update($request->all());
        return redirect()->route('tasks.index')
                        ->with('success', 'Task is created successfully!!!');
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
        return redirect()->route('tasks.index')
                        ->with('success', 'Task is deleted successfully!!!');
    }
}
