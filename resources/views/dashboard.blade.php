@extends('layouts.app')

@section('content')
    <div class="container">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks (Admin)</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{url('task')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input name='name' type="text" class="form-control" placeholder="Name of task">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </form>
                        @if(count($tasks) > 0)
                            <table class="table">
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->name}}</td>
                                        <td>
                                            <form action="{{url('task/'.$task->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <strong>No tasks</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
