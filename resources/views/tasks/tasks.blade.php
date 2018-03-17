<ul class="media-left">
@foreach($tasks as $task)
    <?php $user = $task->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
               @if (Auth::user()->name == $user->name)
                    {!! link_to_action('TasksController@show', $task->id, ['id' => $task->id]) !!}<span class="text-muted">posted at {{ $task->created_at }} </span>
               @endif
            </div>
            <div>
                <p>{!! nl2br(e($task->status)) !!} >> {!! nl2br(e($task->content)) !!}</p>
            </div>
                
                
                    
        
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}