@extends('layouts.app')

@section('content')
  <div class="container">
    @if ($task)
      <task-details :task="{{$task}}"></task-details>
    @endif
  </div>
@endsection
