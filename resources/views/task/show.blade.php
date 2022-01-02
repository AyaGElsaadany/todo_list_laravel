@extends('task.layout')

@section('content')
    <div class="container pt-4">
        <form action="" method="Get">
            @csrf
            <div class="form-group">
                <label for="taskTitle">Title</label>
                <input disabled type="text" name="title" class="form-control" id="taskTitle" value="{{$task->title}}">
            </div>
            <div class="form-group">
                <label for="taskList">List</label>
                <input disabled type="text" name="title" class="form-control" id="taskList" value="{{$task->list->name}}">
            </div>
            <div class="form-group">
                <label for="taskDueDate">Due Date</label>
                <input disabled type="date" name="due_date" class="form-control" id="taskDueDate" value="{{$task->due_date}}">
            </div>
            <div class="form-group">
                <label for="taskSatus">Status</label>
                <input disabled type="text" name="status" class="form-control" id="taskSatus"  value="{{$task->status}}">
            </div>
            <div class="form-group">
                <label for="taskDescription">Description</label>
                <textarea disabled class="form-control" name="description" id="taskDescription" rows="3">{{$task->description}}</textarea>
            </div>
            <div class="form-group d-flex bd-highlight mb-3">
                <a href="{{route('tasks.index')}}" class="btn btn-dark ml-auto p-2 bd-highlight">Back</a>
            </div>
    </form>
    </div>
@endsection
