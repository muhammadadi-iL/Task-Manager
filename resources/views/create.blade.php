@extends('layout')
@section('content')



    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12">

                <div class="pb-3">
                    <div class="float-start">
                        <h4>Create Task</h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route("task.index") }}" class="btn btn-success">
                            All Task
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problem with your fields... <br><br>

                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card card-body bg-light p-4">
                    <form action="{{ route("task.store") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="text" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="eg: (...)">
                        </div>

                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea type="text" class="form-control" id="description" name="description" rows="5" placeholder="eg: (...)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($statuses as $status)
                                    <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
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


