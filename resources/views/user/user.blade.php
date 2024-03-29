<x-app-layout>
    @stack('styles')
    <div class="profile">
        <div class="profile-header">
            <img src="{!! $card !!}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-card.png') }}'">
        </div>
        <div class="profile-main">
            <div class="profile-main-header">
                <div class="profile-main-header-description">
                    <div class="profile-main-description-header-avatar">
                        <img src="{!! $avatar !!}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-icon.png') }}'">
                    </div>
                    <div class="profile-main-header-description-text">
                        <p class="profile-main-header-description-name">{{ $user->user_name }}</p>
                        <p class="profile-main-header-description-id">{{ '@'. $user->user_id }}</p>
                        <p class="profile-main-header-description-follower">フォロワー: {{ $follower }}人</p>
                    </div>
                </div>
                <div class="profile-main-header-follow">
                    @if($isFollow === -1)
                        <a href="{{ route('setting') }}">設定</a>
                    @elseif($isFollow === 0)
                        {{ Form::open(array('route' => array('user-follow', 'user_id' => $user->id))) }}
                        {{ Form::submit('フォロー', ['class' => '']) }}
                        {{ Form::close() }}
                    @else
                        {{ Form::open(array('route' => array('user-unfollow', 'user_id' => $user->id))) }}
                        {{ Form::submit('アンフォロー', ['class' => '']) }}
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
            <div class="profile-main-body-markdown">
                {!! $article->description !!}
            </div>
            <h3>出品中</h3>
            <div class="profile-main-work">
                <div class="profile-main-work-1">
                    <div class="profile-main-work-1-image">
                        <img src="{{asset('img/sampleimage.png')}}">
                    </div>
                    <div class="profile-main-work-1-description">
                        <p class="profile-main-work-1-description-title">課題代行します</p>
                        <p class="profile-main-work-1-description-price">3000円～</p>
                        <p class="profile-main-work-1-description-achievement">実績23件</p>
                    </div>
                </div>
                <div class="profile-main-work-1">
                    <div class="profile-main-work-1-image">
                        <img src="{{asset('img/sampleimage.png')}}">
                    </div>
                    <div class="profile-main-work-1-description">
                        <p class="profile-main-work-1-description-title">課題代行します</p>
                        <p class="profile-main-work-1-description-price">3000円～</p>
                        <p class="profile-main-work-1-description-achievement">実績23件</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</x-app-layout>
