@extends('taskList.layout')

@section('content')
    <div class="container pt-4">
        <form action="{{route('task_list.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="listName">Name</label>
                <input type="text" name="name" class="form-control" id="taskTitle" placeholder="Enter List Name">
            </div>
            <div class="form-group">
                <label hidden for="listUser">User</label>
                <input hidden type="text" name="user_id" value="{{$user->id}}" class="form-control" id="listUser">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
    </form>
    </div>
@endsection
