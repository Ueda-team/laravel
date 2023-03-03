<x-app-layout>
    <x-dashboard :user="$user" :pi="$pi" :title="$title" :avatar="$avatar">
        <div class="work_wrap">
            <a class="work_link" href="{{ route('work_add') }}">マーケットに出す</a>
            <a class="work_link" href="{{ route('auction_add') }}">オークションに出す</a>
            <p class="work_p">出品中の作品</p>
            @foreach ($works as $work)
                <a href=" {{ url('work/' . $work['id']) }}">
                    <div class='tablewrap'>
                    <img class='work_image' src={{ $work->getImage($work->id) }} onError="this.onerror=null;this.src='{{ asset('img/no-icon.png') }}';">
                    <table class='work_table'>
                        <tr><td>作品名</td><td>{{$work['title']}}</td>
                        <td>概要</td><td>{{$work['outline']}}</td></tr>
                        <tr><td>プレビュー</td><td>{{$work['preview']}}</td>
                        <td>価格</td><td>{{$work['price']}}</td></tr>
                        <tr><td>出品日</td><td>{{$work['created_at']}}</td></tr>
                        </table>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $works->links() }}
    </x-dashboard>
</x-app-layout>
