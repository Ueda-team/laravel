<x-app-layout>
    <div class="auction-content">
        <div class="auction-main">
            <div class="auction-image">
                {!! $work->getImage($work->id) !!}
            </div>
            <div class="auction-sub">
                <div class="auction-sub-top">
                    <p class="auction-sub-top-title">{{ $work->title }}</p>
                    <p class="auction-sub-top-price">価格 <span>{{ $work->price }}</span> 円</p>
                </div>
                <div class="auction-sub-body">
                    <div class="auction-sub-body-flex">
{{--                        <p>残り<span>1</span> 日</p>--}}
                    </div>
                    {{--                <p>終了予定時刻<span></span></p>--}}
                </div>
                <div class="auction-sub-bid">
                    {{ Form::open(array('route' => array('pd', 'id' => $work->id))) }}
                    {{ Form::submit('購入する',['class' => 'auction-sub-submit auction-sub-pd-submit']) }}
                    {{ Form::close() }}
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
