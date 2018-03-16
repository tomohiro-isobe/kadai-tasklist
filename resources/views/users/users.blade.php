@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $user->name }}
            </div>
            <div>
                @if (Auth::user()->name === $user->name)
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                @else <p>{!! link_to_action('WelcomeController@index', 'View profile', ['id' => $user->id]) !!}</p>
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif