<x-app-layout>
    {{ Form::open() }}
    {{ Form::select('category', $categories, 0) }}
    {{ Form::text('title', null) }}
    {{ Form::textarea('outline') }}
    {{ Form::text('price', null) }}
    {{ Form::text('tag', null) }}
    {{ Form::file('file', $attributes = []) }}
    {{ Form::open(['files' => true]) }}
    {{ Form::open(['method' => 'post']) }}
    {{ Form::submit('出品する') }}
    {{ Form::close() }}
</x-app-layout>
