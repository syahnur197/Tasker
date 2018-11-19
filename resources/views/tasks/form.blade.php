<form action="{{ $form === "create" ? '/tasks' : "/tasks/$task->id"}}" method="POST">
	@csrf
	@if ($form === "edit")
		@method('PATCH')
	@endif
	<div class="row">
		<div class="col-8 col-lg-10 col-md-10">
			<div class="form-group">
				<label for="description">Description <span class="text-danger">*required</span></label>
				<input type="description" 
					class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
					id="description" 
					placeholder="Task Description" 
					name="description" 
					required 
					value="{{ $form === "edit" && old('description', null) == null ? $task->description : old('description') }}">
			</div>
		</div>
		<div class="col-4 col-lg-2 col-md-2" style="margin-top: 2.1em;">
			<input class="btn btn-primary btn-block" type="submit" value="Submit">
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-lg-6 col-md-6">
			<div class="form-group">
				<label for="start_date">Start Date</label>
				<input type="date" 
					class="form-control" 
					id="start_date" 
					name="start_date" value="{{ $form === "edit" && old('start_date', null) == null ? $task->start_date : old('start_date') }}">
			</div>
		</div>
		<div class="col-6 col-lg-6 col-md-6">
			<div class="form-group">
				<label for="end_date">End Date</label>
				<input type="date" 
					class="form-control" 
					id="end_date" 
					name="end_date" 
					value="{{ $form === "edit" && old('end_date', null) == null ? $task->end_date : old('end_date') }}">
			</div>
		</div>
	</div>
	@can('update tasks')
		@include('tasks.assign', ['users' => $users])
	@endcan
</form>