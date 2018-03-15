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
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}<span class="text-muted">posted at {{ $task->created_at }} </span>
                @else {!! link_to_route('users.index',$user->name,['id' => $user->id]) !!}
               @endif
            </div>
            <div>
                <p>{!! nl2br(e($task->status)) !!} >> {!! nl2br(e($task->content)) !!}</p>
            </div>
                @if (Auth::user()->id == $task->user_id)
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                @if (Auth::user()->id == $task->user_id)
                    {!! Form::model(['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                        <div class="form-group">
                            {!! Form::label('status', 'ステータス:') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'タスク:') !!}
                            {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        </div>  
                        {!! Form::submit('編集', ['class' => 'btn btn-info btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                    
        
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}