@extends('task.layout')

@section('content')
    <div class="container pt-4">
        <form action="{{route('tasks.update', $task->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="taskTitle">Title</label>
                <input type="text" name="title" class="form-control" id="taskTitle" placeholder="Enter Task Title" value="{{$task->title}}">
            </div>
            <div class="form-group">
                <label for="taskList">Choose a list</label>
                <select id="taskList" class="form-control" name="list_id">
                    <option selected value="{{$task->list_id}}">Select</option>
                    @foreach( $lists as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="taskDueDate">Due Date</label>
                <input type="date" name="due_date" class="form-control" id="taskDueDate" value="{{$task->due_date}}">
            </div>
            <div class="form-group">
                <label for="taskSatus">Status</label>
                <input type="text" name="status" class="form-control" id="taskSatus"  value="{{$task->status}}">
            </div>
            <div class="form-group">
                <label for="taskDescription">Description</label>
                <textarea class="form-control" name="description" id="taskDescription" rows="3">{{$task->description}}</textarea>
            </div>
            <div class="form-group d-flex bd-highlight mb-3">
                <button type="submit" class="btn btn-info ">Update</button>
                <a href="{{route('tasks.index')}}" class="btn btn-dark ml-auto p-2 bd-highlight">Back</a>
            </div>
    </form>
    </div>
@endsection
