<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Task;
use App\Http\Resources\Task as TaskResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return $this->sendResponse(TaskResource::collection($tasks), 'All Tasks are sent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'list_id' => 'required',
            'due_date' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Please Validate Error', $validator->errors());
        }

        $task = Task::create($input);

        return $this->sendResponse(new TaskResource($task), 'Task is created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        if(is_null($task)){
            return $this->sendError('Task not found');
        }

        return $this->sendResponse(new TaskResource($task), 'Task is found successfully!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'list_id' => 'required',
            'due_date' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Please Validate Error', $validator->errors());
        }

        $task->title = $input['title'];
        $task->status = $input['status'];
        $task->description = $input['description'];
        $task->due_date = $input['due_date'];

        $task->save();

        return $this->sendResponse(new TaskResource($task), 'Task is updated successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return $this->sendResponse(new TaskResource($task), 'Task is deleted successfully!!');
    }
}
