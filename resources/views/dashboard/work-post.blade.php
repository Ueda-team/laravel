<x-app-layout>
    <div class="workpost_wrapper">
        <h2 class="workpost_title">サービスの出品</h2>
        {{ Form::open([ 'files' => true]) }}
        <table class="workpost_table">
            <tr>
                <th class="workpost_th">{!! Form::label('category', 'カテゴリー') !!}</th>
                <td>
                    {{ Form::select('category', ['自分の作品を売る', '仕事を募集する'], 0) }}
                    {{ Form::select('category', $categories, 0) }}
                </td>
            </tr>
            <tr>
                <th class="workpost_th">{!! Form::label('title', 'サービスタイトル') !!}</th>
                <td>{{ Form::text('title', null) }}</td>
            </tr>
            <tr>
                <th class="workpost_th">{!! Form::label('outline', 'サービス概要') !!}</th>
                <td>{{ Form::textarea('outline') }}</td>
            </tr>
            <tr>
                <th class="workpost_th">{!! Form::label('price', '価格') !!}</th>
                <td>{{ Form::number('price', null,) }}</td>
            </tr>
            <tr>
                <th class="workpost_th">{!! Form::label('tag', 'タグ') !!}</th>
                <td>{{ Form::text('tag', null) }}</td>
            </tr>
            <tr>
                <th class="workpost_th">{!! Form::label('file_title', 'ファイル') !!}</th>
                <td class="workpost_th_file">
                    {!! Form::label('file', 'ファイル') !!}
                    {{ Form::file('file', $attributes = []) }}
                </td>
            </tr>
            <tr>
                {{ Form::open(['method' => 'post']) }}
            </tr>
        </table>
        <div class="work_post">
            {{ Form::submit('出品する',['class' => 'work_post']) }}
            {{ Form::close() }}
        </div>
    </div>
</x-app-layout>
