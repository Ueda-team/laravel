<x-app-layout>
    <p>出品中の作品</p>
    <a href="{{ url('/user/' .  Auth::user()->user_id . '/work/post') }}">出品する</a>
</x-app-layout>
