<x-app-layout>
    <div class="workpost_wrap">
        <div class=workpost_wrapper"" ></div>
        <h2 class="workpost_h2">サービスの出品</h2>
        <table class="workpost_table">
            <tr>{{ Form::open() }}</tr>
            <tr>
                <td>{!! Form::label('category', 'カテゴリー') !!}</td>
                <td>{{ Form::select('category', $categories, 0) }}</td>
            </tr>
            <tr>
                <td>{!! Form::label('title', 'サービスタイトル') !!}</td>
                <td>{{ Form::text('title', null) }}</td>
            </tr>
            <tr>
                <td>{!! Form::label('outline', 'サービス概要') !!}</td>
                <td>{{ Form::textarea('outline') }}</td>
            </tr>
            <tr>
                <td>{!! Form::label('price', '価格') !!}</td>
                <td>{{ Form::text('price', null) }}</td>
            </tr>
            <tr>
                <td>{!! Form::label('tag', 'タグ') !!}</td>
                <td>{{ Form::text('tag', null) }}</td>
            </tr>
            <tr>
                <td>{!! Form::label('file', 'ファイル') !!}</td>
                <td>{{ Form::file('file', $attributes = []) }}</td>
            </tr>
            <tr>
                {{ Form::open(['files' => true]) }}
            </tr>
            <tr>
                {{ Form::open(['method' => 'post']) }}
            </tr>
        </table>
        {{ Form::submit('出品する',['class' => 'work_post']) }}
        {{ Form::close() }}
    </div>


</x-app-layout>
