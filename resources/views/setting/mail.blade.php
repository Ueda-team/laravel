<x-app-layout>
    <x-setting-list :title="$title">
        <div class="setting-account">
            @if(session('change'))
                <h3>保存しました</h3>
            @endif
            <div class="setting-account-avatar setting-box">
                <h3>メールアドレス変更</h3>
                　{{ Form::open(array('route' => array('setting-email-change'))) }}
                {{ Form::text('email', $user->email) }}
                {{ Form::submit('保存', ['class' => '', '']) }}
                {{ Form::close() }}
            </div>
        </div>
    </x-setting-list>
</x-app-layout>
