@extends('taskList.layout')

@section('content')
    <div class="container pt-4">
        <form action="" method="GET">
            @csrf
            <div class="form-group">
                <label for="listName">Name</label>
                <input disabled type="text" value="{{$list->name}}" name="name" class="form-control" id="taskTitle">
            </div>
            <div class="form-group">
                <label for="listTasks">Tasks in this list</label>
                <ul id="listTasks" class="list-group">
                    @foreach ($list->tasks as $item)
                        <li class="list-group-item">{{$item->title}}</li>
                    @endforeach

                </ul>
            <div class="form-group">
            <div class="form-group d-flex bd-highlight mb-3">
                <a href="{{route('task_list.index')}}" class="btn btn-dark ml-auto p-2 bd-highlight">Back</a>
            </div>
    </form>
    </div>
@endsection
