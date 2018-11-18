@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Create Task</div>
            <div class="card-body">
                @include('tasks.form', ['form' => 'create', 'task' => ''])
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    @include('tasks.pending', ["pending_tasks" => $pending_tasks])
    @include('tasks.in_process', ["in_process_tasks" => $in_process_tasks])
    @include('tasks.completed_today')
</div>
@endsection
