@extends('layout')
@section('content')



    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12">

                <div class="pb-3">
                    <div class="float-start">
                        <h4>My Task</h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route("task.create") }}" class="btn btn-success">
                           <i class="fa fa-plus-circle"></i> Create Task
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                @foreach($tasks as $task)
                <div class="card">
                    <h5 class="card-header">
                        @if($task->status === "Todo")
                            {{ $task->title }}
                            @else
                            <del>{{ $task->title }}</del>
                            @endif

                        <span class="badge rounded-pill bg-warning text-dark ms-1">
                            {{ $task->created_at->diffforHumans() }}
                        </span>
                    </h5>

                    <div class="card-body">
                        <div class="card-text">
                            <div class="float-start">
                            @if($task->status === "Todo")
                            {{ $task->description }}
                            @else
                            <del>{{ $task->description }}</del>
                            @endif
                            <br>

                            @if($task->status === "Todo")
                            <span class="badge rounded-pill bg-info text-dark my-3">
                                Todo
                            </span>
                            @else
                            <span class="badge rounded-pill bg-dark text-white my-3">
                                Done
                            </span>
                            @endif

                            <small>Last Updated - {{ $task->updated_at->diffforHumans() }} </small>
                            </div>

                            <div class="float-end">
                                <a href="{{ route("task.edit", $task->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route("task.destroy", $task->id) }}" style="display:inline;" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection


