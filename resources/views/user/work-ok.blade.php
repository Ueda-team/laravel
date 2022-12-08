<x-app-layout>
    <p>出品が完了しました</p>
    <a href="{{ url('/user/' .  Auth::user()->user_id . '/works/' . $work->id) }}">出品した商品ページ</a>
    <a href="{{ url('/') }}">トップに戻る</a>
</x-app-layout>
