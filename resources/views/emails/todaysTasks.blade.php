@component('mail::message')
# Your Today's Tasks

Please refer to your tasks today
@if ($pendingTasks->isNotEmpty())
## Pending Tasks
@foreach ($pendingTasks as $task)
* {{$task->description}}
@endforeach	
@endif

@if ($inProcessTasks->isNotEmpty())
## In Process Tasks
@foreach ($inProcessTasks as $task)
* {{$task->description}}
@endforeach
@endif

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
