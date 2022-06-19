@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="col-12">Edit task</h1>
    <div class="panel-body">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <task-edit :task="{{$task}}" />
    </div>
  </div>
@endsection