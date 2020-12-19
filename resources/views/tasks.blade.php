@extends('layout.main')

@section('content')
    <div class="container">
        <form action="{{url('tasks')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col">
                    <input  name="name" class="form-control" type="text" >
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>
                        <form action="{{url('tasks').'/'.$task->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
