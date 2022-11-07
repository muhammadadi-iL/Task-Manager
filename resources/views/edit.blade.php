@extends('layout')
@section('content')



    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12">

                <div class="pb-3">
                    <div class="float-start">
                        <h4>Edit Task <span class="badge bg-warning text-dark">{{ $task->title }}</span> </h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route("task.index") }}" class="btn btn-success">
                            All Task
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="card card-body bg-light p-4">
                    <form action="{{ route("task.update", $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="text" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                        </div>

                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $task->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($statuses as $status)
                                    <option value="{{ $status['value'] }}" {{ $task->status === $status['value'] ? 'selected' : '' }}>{{ $status['label'] }}</option>
                                @endforeach
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>


            </div>
        </div>
    </div>
@endsection


