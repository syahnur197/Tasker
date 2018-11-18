@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Task</div>
            <div class="card-body">
                @include('tasks.form', ['form' => 'edit', 'task' => $task])
            </div>
        </div>
    </div>
</div>
@endsection
