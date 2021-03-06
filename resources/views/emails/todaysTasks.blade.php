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

@if ($dueTodayTasks->isNotEmpty())
## Due Today Tasks
@foreach ($dueTodayTasks as $task)
* {{$task->description}}
@endforeach
@endif

Please log in to [Tasker](https://tasker.nextacloud.com) <br>
Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
