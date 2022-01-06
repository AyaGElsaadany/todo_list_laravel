<?php

namespace App\Http\Controllers;

use App\Task;
use App\Task_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Task_list::where('user_id', Auth::id())->latest()->with('tasks')->paginate(4);
        return view('TaskList.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('TaskList.create', compact('user'));
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
            'name' => 'required',
        ]);
        $list = Task_list::create($request->all());
        return redirect()->route('task_list.index')
                        ->with('success', 'List is created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task_list  $task_list
     * @return \Illuminate\Http\Response
     */
    public function show(Task_list $task_list)
    {
        $list = $task_list->where('id', $task_list->id)->with('tasks')->first();
        //dd($list->toArray());
        return view('TaskList.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task_list  $task_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Task_list $task_list)
    {
        return view('TaskList.edit', compact('task_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task_list  $task_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task_list $task_list)
    {
        $request->validate([
            'name' => 'required',
        ]);
        //$list = Task_list::where('id', $request->id)->update($request->all());
        $task_list->update($request->all());
        return redirect()->route('task_list.index')
                        ->with('success', 'List is updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task_list  $task_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task_list $task_list)
    {
        $task_list->delete();
        return redirect()->route('task_list.index')
                        ->with('success', 'List is deleted successfully!!!');
    }
}
