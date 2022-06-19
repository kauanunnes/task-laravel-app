@extends('layouts.app')

@section('content')
  <div class="container">
    @if (count($tasks) > 0)
      <task-list :tasks="{{$tasks}}"></task-list>

    @else
      <div class="row">
        <div class="d-flex flex-column align-items-center">
          <h1 class="text-center">
            No tasks added yet.
          </h1>
          <a href="task/new" class="anchor-btn-link">Add a new task</a>
        </div>
      </div>
    @endif
  </div>
@endsection
