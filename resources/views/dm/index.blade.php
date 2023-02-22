<x-app-layout>
    <div class="dm-wrapper">
        <div>
            @if(count($dm) === 0)
                <h2>メッセージ</h2>
                <p>メッセージがありません</p>
            @else
                {{ $dm }}
            @endif
        </div>
    </div>
</x-app-layout>
