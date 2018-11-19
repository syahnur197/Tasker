<div class="row justify-content-center">
    @include('tasks.pending', ["pending_tasks" => $pending_tasks])
    @include('tasks.in_process', ["in_process_tasks" => $in_process_tasks])
    @include('tasks.completed_today')
</div>