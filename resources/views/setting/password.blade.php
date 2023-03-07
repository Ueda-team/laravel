<x-app-layout>
    <x-setting-list :title="$title">
        <div class="setting-account">
            @if(session('change'))
                <h3>保存しました</h3>
            @endif
            <div class="setting-account-avatar setting-box">
                <h3>パスワード変更</h3>
                {{ Form::open(array('route' => array('setting-password-change'))) }}
                {{ Form::label('now_password', '現在のパスワード') }}
                {{ Form::password('now_password') }} <br>
                {{ Form::label('new_password', '新しいパスワード') }}
                {{ Form::password('new_password') }} <br>
                {{ Form::label('new2_password', 'パスワードを再入力してください') }}
                {{ Form::password('new2_password') }} <br>
                {{ Form::submit('保存', ['class' => 'password_submit', '']) }}
                {{ Form::close() }}
            </div>
        </div>
    </x-setting-list>
</x-app-layout>
