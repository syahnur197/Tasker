<div class="col-md-4">
	<div class="card">
		<div class="card-header bg-warning">Pending</div>
		<div class="card-body">
			@if ($pending_tasks->isEmpty())
				No Pending Tasks
			@endif
			@foreach ($pending_tasks as $task)
				@include('tasks.task', ['task' => $task, 'status' => 1])
			@endforeach
		</div>
	</div>
</div>