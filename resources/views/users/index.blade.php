@extends('layouts.app')

@section('content')
    <div class="jumbotron container">
        <hr class="my-4">
        <p>All Users</p>
        <a class="btn btn-info btn-lg" href="{{route('user.create')}}" role="button">Create</a>

    </div>

    @if ($users->count() > 0)
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }} </td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST">
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
    </div>
    @endif

@endsection
