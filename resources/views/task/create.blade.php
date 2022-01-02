@extends('task.layout')

@if (isset($errors) && count($errors))

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>

@endif

@section('content')
    <div class="container pt-4">
        <form action="{{route('tasks.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="taskTitle">Title</label>
                <input type="text" name="title" class="form-control" id="taskTitle" placeholder="Enter Task Title">
            </div>
            <div class="form-group">
                <label for="taskList">Choose a list</label>
                <select id="taskList" class="form-control" name="list_id">
                    <option selected>Select</option>
                    @foreach( $lists as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="taskDueDate">Due Date</label>
                <input type="date" name="due_date" class="form-control" id="taskDueDate" >
            </div>
            <div class="form-group">
                <label for="taskSatus">Status</label>
                <input type="text" name="status" class="form-control" id="taskSatus">
            </div>
            <div class="form-group">
                <label for="taskDescription">Description</label>
                <textarea class="form-control" name="description" id="taskDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
    </form>
    </div>
@endsection
