@extends('task.layout')

@section('content')
    <div class="jumbotron container">
        <hr class="my-4">
        <p>To create new task click on this button</p>
        <a class="btn btn-info btn-lg" href="{{route('tasks.create')}}" role="button">Create</a>

    </div>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Task Title</th>
                <th scope="col">Task Description</th>
                <th scope="col">Task Deu Date</th>
                <th scope="col">Task Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($lists as $item)
                    @foreach ($item->tasks as $task )
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }} </td>
                            <td>{{ $task->due_date }} </td>
                            <td>{{ $task->status }} </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm">
                                        <a class="btn btn-dark" href="{{route('tasks.edit', $item->id)}}">Edit</a>
                                    </div>
                                    <div class="col-sm">
                                        <a class="btn btn-info" href="{{route('tasks.show', $item->id)}}">Show</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('tasks.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Delete </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
          </table>
          {{ $lists->links() }}
    </div>


@endsection
