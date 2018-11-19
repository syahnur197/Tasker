@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Create Task</div>
            <div class="card-body">
                @include('tasks.form', ['form' => 'create', 'task' => '', 'users' => $users])
            </div>
        </div>
    </div>
</div>
@include('tasks.my_task', ["pending_tasks" => $pending_tasks, "in_process_tasks" => $in_process_tasks])
@endsection
