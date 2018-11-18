<div class="col-md-4">
	<div class="card">
		<div class="card-header bg-success text-white">Completed Today</div>
		<div class="card-body">
			@if ($completed_today_tasks->isEmpty())
				No Tasks Completed Today
			@endif
			@foreach ($completed_today_tasks as $task)
				@include('tasks.task', ['task' => $task, 'status' => 3])
			@endforeach
		</div>
	</div>
</div>