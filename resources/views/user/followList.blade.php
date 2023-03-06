<x-app-layout>
    <p>フォロー数 {{ count($userList) }}人</p>
    @foreach($userList as $user)
        <div>
            <div>
                {!! $user->getAvatar($user->id) !!}
            </div>
            <div>
                {{ $user->user_name }}
            </div>
            <div>
                {{ Form::open(array('route' => array('user-unfollow', 'user_id' => $user->id))) }}
                {{ Form::submit('アンフォロー', ['class' => '']) }}
                {{ Form::close() }}
            </div>
        </div>
    @endforeach
</x-app-layout>
