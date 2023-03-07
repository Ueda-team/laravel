<x-app-layout>
    <div class="workok_wrapper">
        <p>出品が完了しました</p>
        <div class="workok_wrap">
            <a href="{{ url('/work/' . $work->id) }}">出品した商品を見る</a>
            <a href="{{ url('/') }}">トップに戻る</a>
        </div>
    </div>
</x-app-layout>
