<x-app-layout>
    <p>支払いが完了していない作品</p>
    <div class="work_wrap">
        @foreach ($cart as $claim)
            <a href=" {{ url('work/' . $claim['id']) }}">
                <div class='tablewrap'>
                    {!! $claim->getImage($claim->work_id, 'work_image') !!}
                    <table class='work_table'>
                        <tr><td>作品名</td><td>{{$claim['title']}}</td></tr>
                        <tr><td>価格</td><td>{{$claim['price']}}</td></tr>
                        <tr><td>購入日</td><td>{{ date('Y-m-d H:i:s', strtotime($claim['created_at'])) }}</td></tr>
                    </table>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
