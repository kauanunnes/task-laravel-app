@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel-body">
      <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- New Task Form -->
      <form action="{{ url('task') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- Task Name -->
          <div class="form-group">
              <label for="title" class="col-sm-3 control-label">Title</label>

              <div class="col-sm-6">
                  <input type="text" name="title" id="task-title" class="form-control">
              </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Description</label>

            <div class="col-sm-6">
                <input type="text" name="description" id="task-description" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="url" class="col-sm-3 control-label">Attach URL</label>

            <div class="col-sm-6">
                <input type="url" name="url" id="task-url" class="form-control">
            </div>
        </div>
          <!-- Add Task Button -->
          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-primary">
                      <i class="fa fa-plus"></i> Add Task
                  </button>
              </div>
          </div>
      </form>
    </div>
    @if (count($tasks) > 0)
      <task-list :tasks="{{$tasks}}"></task-list>
    @endif
  </div>
@endsection
