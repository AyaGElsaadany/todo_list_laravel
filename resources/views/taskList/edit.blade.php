@extends('taskList.layout')

@section('content')
    <div class="container pt-4">
        <form action="{{route('task_list.update', $task_list->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="listName">Name</label>
                <input type="text" value="{{$task_list->name}}" name="name" class="form-control" id="taskTitle" placeholder="Enter List Name">
            </div>
            <div class="form-group d-flex bd-highlight mb-3">
                <button type="submit" class="btn btn-info ">Update</button>
                <a href="{{route('task_list.index')}}" class="btn btn-dark ml-auto p-2 bd-highlight">Back</a>
            </div>
    </form>
    </div>
@endsection
