@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-2">
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-header bg-success text-white">Completed Tasks</div>
		</div>
		@php
			$date = "";
		@endphp
		@foreach ($tasks as $task)
			@php
				$completed_on = Carbon\Carbon::parse($task->completed_on)->format('d M Y')
			@endphp
			{!! $date == $completed_on ? NULL : "<hr>Task completed on : " !!}
			{{ $date = $date ==  $completed_on ? NULL :  $completed_on }}
			@include('tasks.task', ['task' => $task, 'status' => 3])
		@endforeach
    </div>
</div>

@endsection

