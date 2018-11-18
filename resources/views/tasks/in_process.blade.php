<div class="col-md-4">
	<div class="card">
		<div class="card-header bg-info text-white">In Process</div>
		<div class="card-body">
			@if ($in_process_tasks->isEmpty())
				No In Process Tasks
			@endif
			@foreach ($in_process_tasks as $task)
				@include('tasks.task', ['task' => $task, 'status' => 2])
			@endforeach
		</div>
	</div>
</div>