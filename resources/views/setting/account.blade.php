<x-app-layout>
    <x-setting-list :title="$title">
        @push('styles')
        <div class="setting-account">
            @if(session('change'))
                <h3>保存しました</h3>
            @endif
            <div class="setting-account-avatar setting-box">
                <h3>アイコン変更</h3>
                <div class="setting-account-avatar-img">
                    {!! $user->getAvatar($user->id) !!}
                </div>
                {{ Form::open(array('route' => array('setting-account-avatar-change'), 'enctype'=>'multipart/form-data'), []) }}
                {{ Form::label('file', 'ファイル') }}
                {{ Form::file('file', $attributes = []) }}
                {{ Form::submit('保存', ['class' => 'avatar_submit', '']) }}
                {{ Form::close() }}
            </div>
            <div class="setting-account-name setting-box">
                <h3>ユーザー名変更</h3>
                {{ Form::open(array('route' => array('setting-account-username-change'))) }}
                {{ Form::text('username', $user->user_name) }}
                {{ Form::submit('保存', ['class' => 'name_submit', '']) }}
                {{ Form::close() }}
            </div>
            <div class="setting-account-id setting-box">
                <h3>ユーザーID変更</h3>
                {{ Form::open(array('route' => array('setting-account-id-change'))) }}
                {{ Form::text('userid', $user->user_id) }}
                {{ Form::submit('保存', ['class' => 'id_submit', '']) }}
                {{ Form::close() }}
            </div>
            <div class="setting-account-description setting-box">
                <h3>自己紹介変更</h3>
                <p>マークダウンに対応しています</p>
                {{ Form::open(array('route' => array('setting-account-description-change'))) }}
                {{ Form::textarea('description', $userDescription->description, ['class' => 'block w-full mt-1 rounded-md']) }}
                {{ Form::submit('保存', ['class' => 'description_submit', '']) }}
                {{ Form::close() }}
            </div>
        </div>
    </x-setting-list>
</x-app-layout>
