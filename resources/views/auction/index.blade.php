<x-app-layout>
<div class="auction-content">
    <div class="auction-main">
        <div class="auction-image">
            {!! $work->getImage($work->id) !!}
        </div>
        <div class="auction-sub">
            <div class="auction-sub-top">
                @if(session('bid'))
                    <h3>入札しました！</h3>
                @endif
                @if($isBid)
                    <h3>あなたが最高入札者です!</h3>
                @endif
                <p class="auction-sub-top-title">{{ $work->title }}</p>
                <p class="auction-sub-top-price">現在 <span>{{ $price }}</span> 円</p>
                <p class="auction-sub-top-price">即決 <span>{{ $auction->max_price }}</span> 円</p>
            </div>
            <div class="auction-sub-body">
                <div class="auction-sub-body-flex">
                    <p>入札 <span>{{ $count }}</span> 件</p>
                    <p>残り <span>{{ $auction->diff($auction->end_date) }}</span></p>
                </div>
                <p class="auction-sub-body-end-date">終了予定時刻<span>{{ date('Y年m月d日 H時i分s秒', strtotime($auction->end_date)) }}</span></p>
            </div>
            <div class="auction-sub-bid">
                @if($isEnd)
                    @if($auction->status)
                        {{ Form::open(array('route' => array('bid', 'id' => $auction->id)), ) }}
                        {{ Form::number('price', ($price + 10) < $auction->max_price ? ($price + 10) : $auction->max_price ) }} 円 <br>
                        {{ Form::submit('入札する',['class' => 'auction-sub-bid-submit auction-sub-submit', '']) }}
                        {{ Form::close() }}
                        {{ Form::open(array('route' => array('pd', 'id' => $auction->id))) }}
                        {{ Form::submit('即決で購入する',['class' => 'auction-sub-submit auction-sub-pd-submit']) }}
                        {{ Form::close() }}
                    @else
                        <p>オークションは終了しました</p>
                    @endif
                @else
                    <p>オークションは落札されました</p>
                @endif
            </div>
            <div class="auction-sub-user">
                <div class="auction-sub-user-avatar">
                </div>
                <div class="auction-sub-user-description">
{{--                    <p>{{ $user->user_name }}</p>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
