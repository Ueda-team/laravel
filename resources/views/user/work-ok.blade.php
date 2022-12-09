<x-app-layout>
    <p>出品が完了しました</p>
    <div class="workok_wrap">
        <a href="{{ url('/user/' .  Auth::user()->user_id . '/works/' . $work->id) }}">出品した商品を見る</a>
        <a href="{{ url('/user/work-all') }}">出品作品一覧</a>
        <a href="{{ url('/') }}">トップに戻る</a>
    </div>
</x-app-layout>
