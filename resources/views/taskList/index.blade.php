@extends('taskList.layout')

@section('content')
    <div class="jumbotron container">
        <hr class="my-4">
        <p>To create new list click on this button</p>
        <a class="btn btn-info btn-lg" href="{{route('task_list.create')}}" role="button">Create</a>

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
                <th scope="col">List Name</th>
                <th scope="col">List Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($lists as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-dark" href="{{route('task_list.edit', $item->id)}}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-info" href="{{route('task_list.show', $item->id)}}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('task_list.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> Delete </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $lists->links() }}
    </div>


@endsection
