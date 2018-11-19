<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="form-group">
			<label for="description">Assign to:</label>
			<select class="form-control" id="owner_id" name="owner_id">
				<option value="">Default (you)</option>
				@foreach ($users as $user)
					<option value="{{ $user->id }}">{{$user->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>