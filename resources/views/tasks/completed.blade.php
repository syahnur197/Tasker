@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-2">
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-header">Completed Tasks</div>
		</div>
		@php
			$date = "";
		@endphp
		@foreach ($tasks as $task)
			{{ $date == $task->completed_on ? NULL : "Task completed on : " }}
			{{ $date = $date == $task->completed_on ? NULL : $task->completed_on }}
			@include('tasks.task', ['task' => $task, 'status' => 3])

		@endforeach
    </div>
</div>

@endsection

