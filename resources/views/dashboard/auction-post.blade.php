<x-app-layout>
    <div class="auctionpost_wrapper">
        <h2 class="auctionpost_title">オークションに出品</h2>
        {{ Form::open() }}
        <table class="auctionpost_table">
            <tr>
                <th class="auctionpost_th">{!! Form::label('category', 'カテゴリー') !!}</th>
                <td>
                    {{ Form::select('type', ['自分の作品を売る', '仕事を募集する'], 0) }}
                    {{ Form::select('category', $categories, 0) }}
                </td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('title', 'サービスタイトル') !!}</th>
                <td>{{ Form::text('title', null) }}</td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('outline', 'サービス概要') !!}</th>
                <td>{{ Form::textarea('outline') }}</td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('start_price', '開始価格') !!}</th>
                <td>{{ Form::number('start_price', null) }}</td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('max_price', '即決価格') !!}</th>
                <td>{{ Form::number('max_price', null) }}</td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('tag', 'タグ') !!}</th>
                <td>{{ Form::text('tag', null) }}</td>
            </tr>
            <tr>
                <th class="auctionpost_th">{!! Form::label('file_title', 'ファイル') !!}</th>
                <td class="auctionpost_th_file">
                    {!! Form::label('file', 'ファイル') !!}
                    {{ Form::file('file', $attributes = []) }}
                </td>
            </tr>
            <tr>
                {{ Form::open(['method' => 'post']) }}
            </tr>
        </table>
        <div class="auction_post">
            {{ Form::submit('出品する',['class' => 'work_post']) }}
            {{ Form::close() }}
        </div>
    </div>
</x-app-layout>
