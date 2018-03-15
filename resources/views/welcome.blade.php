@extends('layouts.app')
    
@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-xs-4">
                {!! Form::open(['route' => 'tasks.store']) !!}
            <div class="form-group">
                {!! Form::label('status', 'ステータス:') !!}
                {!! Form::text('status',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'タスク:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            
        {!! Form::close() !!}
            </aside>
            <div class="col-xs-8">
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection