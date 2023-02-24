<x-app-layout>
    <x-dashboard :user="$user" :pi="$pi" :title="$title">
        <div class="work_wrap">
            <a class="work_link" href="{{ route('work_add') }}">マーケットに出す</a>
            <a class="work_link" href="{{ route('auction_add') }}">オークションに出す</a>
            <p class="work_p">出品中の作品</p>
            @foreach ($works as $work)
                <div class='tablewrap'>
                <img class='work_image' src={{ asset('storage/' . $work['url'])}}>
                <table class='work_table'>
                    <tr><td>作品名</td><td>{{$work['title']}}</td>
                    <td>概要</td><td>{{$work['outline']}}</td></tr>
                    <tr><td>プレビュー</td><td>{{$work['preview']}}</td>
                    <td>価格</td><td>{{$work['price']}}</td></tr>
                    <tr><td>出品日</td><td>{{$work['created_at']}}</td></tr>
                    </table>
                </div>
            @endforeach
        </div>
        {{ $works->links() }}
    </x-dashboard>
</x-app-layout>
