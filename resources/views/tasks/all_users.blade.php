@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Select Users</div>
            <div class="card-body">
                <form action="/users" method="GET" onchange="this.submit()">
                    <div class="row">
                    	<div class="col-lg-10 col-md-10 col-8">
                    		<select class="form-control" name='owner_id' id="owner_id">
                                <option value="">Please Choose</option>
                    		    @foreach ($users as $user)
        							<option value="{{ $user->id }}" {{Request::get('owner_id')== $user->id ? "selected" : ""}}>{{ $user->name }}</option>
        						@endforeach
                    		</select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(!empty($user))
    @include('tasks.my_task', ["pending_tasks" => $pending_tasks, "in_process_tasks" => $in_process_tasks])
@endif
@endsection