<div class="dashboard-wrapper">
    <div class="card">
        <div class="card-top">
            <div class="card-avatar">
                @if(!$user->avatar)
                    <img src="{{ asset('img/no-icon.png') }}" alt="">
                @else
                    <img src="{!! $avatar !!}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-icon.png') }}';">
                @endif
            </div>
            <p class="card-username">{{ $user->user_name }}</p>
            <p class="card-identification">本人確認: {!! $pi->identification ? '✅' : '<a href="/">✖ 未認証</a>' !!} </p>
        </div>
        <div class="card-menu">
            <div class="card-menu-top">
                <p>メニュー</p>
            </div>
            <div class="card-menu-list">
                <ul>
                    <li><a href="{{ url('users/' .  Auth::user()->user_id) }}">プロフィール</a></li>
                    <li><a href="{{ route('dashboard') }}">ダッシュボード</a></li>
                    <li><a href="{{ route('dashboard-work') }}">出品管理</a></li>
                    <li><a href="{{ route('dm') }}">メッセージ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <h2 class="dashboard-title">{{ $title }}</h2>
        {{ $slot }}
    </div>
</div>
