<x-app-layout>
    @if(session('change'))
        <p>登録しました</p>
    @endif
    {{ Form::open(array('route' => array('admin_news_post'))) }}
        {{ Form::label('title', 'タイトル') }}
    {{ Form::text('title', null) }}
        {{ Form::label('detail', '内容') }}
    {{ Form::textarea('detail', null, ['class' => 'block w-full mt-1 rounded-md']) }}
    {{ Form::submit('登録', ['class' => 'description_submit', '']) }}
    {{ Form::close() }}
</x-app-layout>
