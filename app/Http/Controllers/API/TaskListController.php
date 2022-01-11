<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Task_list;
use App\Http\Resources\TaskList as TaskListResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

class TaskListController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Task_List::all();
        return $this->sendResponse(TaskListResource::collection($lists), 'All lists are sent');
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
            'name' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Please Validate Error', $validator->errors());
        }

        $list = Task_list::create($input);
        $list->user_id = Auth::id();

        return $this->sendResponse(new TaskListResource($list), 'List is created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Task_list::find($id);

        if(is_null($list)){
            return $this->sendError('List not found');
        }

        return $this->sendResponse(new TaskListResource($list), 'List is found successfully!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task_list $list)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Please Validate Error', $validator->errors());
        }

        $list->name = $input['name'];
        $list->user_id = $input['user_id'];
        //dd($input['tasks']);
        $list->tasks = $input['tasks'];

        $list->save();

        return $this->sendResponse(new TaskListResource($list), 'List is updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task_list $list)
    {
        $list->delete();
        return $this->sendResponse(new TaskListResource($list), 'List is deleted successfully!!');
    }
}
