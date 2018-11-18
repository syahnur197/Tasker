<div class="card bg-dark text-light p-3 mb-2">
	<div class="row no-gutters">
		<div class="{{ $status == 1 || $status == 2 ? 'col-3 col-lg-3 col-md-3 mr-1' : ''}}">
			@if ($status === 1)
				<form method="POST" action="/tasks/{{ $task->id }}/start">
					@csrf
					<button class="btn btn-primary btn-block btn-sm">
						Start
					</button>
				</form>
			@endif
			@if ($status === 2)
				<form method="POST" action="/tasks/{{ $task->id }}/stop">
					@csrf
					<button class="btn btn-success btn-block btn-sm">
						End
					</button>
				</form>
			@endif
		</div>
		<div class="col-3 col-lg-3 col-md-3">
			<a href="/tasks/{{ $task->id }}/edit" class="btn btn-block btn-warning btn-sm">
				Edit
			</a>
		</div>
		<div class="col-3 col-lg-3 col-md-3 ml-1">
			<form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete task?');">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-block btn-danger btn-sm">
					Delete
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-12 col-md-12">
			<h5 class="mb-0 mt-2">{{ $task->description }}</h5>
		</div>
	</div>
	@if ($task->start_date !== NULL && $task->completed_on == NULL)
		<p class="mb-0">Start Date: {{ $task->start_date }}</p>
	@endif
	@if ($task->end_date !== NULL && $task->completed_on == NULL)
		<p class="mb-0">End Date: {{ $task->end_date }}</p>
	@endif
	@if ($task->completed_on !== NULL)
		<p class="mb-0">Completed Date: {{ $task->completed_on }}</p>
	@endif
</div>

 