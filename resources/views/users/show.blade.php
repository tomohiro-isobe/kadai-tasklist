@extends('layouts.app')

@section('content')

 <div class="col-xs-6">
            
          
    @if (count($tasks) > 0 && Auth::user()->name == $user->name)
        <ul class="media-left">
            @foreach($tasks as $task)
                 <?php $user = $task->user; ?>
            <li class="media">
                    <div class="media-left">
                         <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                     </div>
        <div class="media-body">
                 <div>
                    {{ $user->name, ['id' => $user->id] }}<span class="text-muted">>posted at {{ $task->created_at }} </span>
                 </div>
                 <div>
                     <p>{!! nl2br(e($task->status)) !!} >> {!! nl2br(e($task->content)) !!}</p>
                 </div>
            </li>
        </ul>
                    {!! Form::model($task,['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
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
                @endforeach
            @endif
         </div>
    </div>
    {!! $tasks->render() !!}
@endsection