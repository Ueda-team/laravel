<x-app-layout>
    <x-setting-list :title="$title">
        <div class="setting-account">
            @if(session('change'))
                <h3>保存しました</h3>
            @endif
            <div class="setting-account-avatar setting-box">
                <h3>アイコン変更</h3>
                <div class="setting-account-avatar-img">
                    <img src="{{ $user->getAvatar($user->id) }}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-icon.png') }}';">
                </div>
                {{ Form::open(array('route' => array('setting-account-avatar-change')), ) }}
                {!! Form::label('file', 'ファイル') !!}
                {{ Form::file('file', $attributes = []) }}
                {{ Form::submit('保存',['class' => '', '']) }}
                {{ Form::close() }}
            </div>
            <div class="setting-account-name setting-box">
                <h3>ユーザー名変更</h3>
                {{ Form::open(array('route' => array('setting-account-username-change')), ) }}
                {{ Form::text('username', $user->user_name) }}
                {{ Form::submit('保存',['class' => '', '']) }}
                {{ Form::close() }}
            </div>
            <div class="setting-account-id setting-box">
                <h3>ユーザーID変更</h3>
                {{ Form::open(array('route' => array('setting-account-id-change')), ) }}
                {{ Form::text('userid', $user->user_id) }}
                {{ Form::submit('保存',['class' => '', '']) }}
                {{ Form::close() }}
            </div>
        </div>
    </x-setting-list>
</x-app-layout>
