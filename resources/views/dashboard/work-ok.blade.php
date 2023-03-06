<x-app-layout>
    <div class="workok_wrap">
        <p>出品が完了しました！</p>
        <div class="goback">
            <a href="{{ url('/user/' .  Auth::user()->user_id . '/works/' . $work->id) }}">出品した商品を見る</a>
            <a href="{{ url('/') }}">トップに戻る</a>
        </div>
    </div>
</x-app-layout>
