<div class="dm-wrapper">
    <div class="card">
        <div class="card-top">
            <div class="card-avatar">
                <img src="{{ asset('img/no-icon.png') }}" alt="">
            </div>
            <p class="card-username">{{ $user->user_name }}</p>
        </div>
        <div class="card-menu">
            <div class="card-menu-top">
                <p>メニュー</p>
            </div>
            <div class="card-menu-list">
                <ul>
                    <li><a href="{{ route('dashboard') }}">ダッシュボード</a></li>
                    <li><a href="{{ route('dashboard-work') }}">出品管理</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        {{ $slot }}
    </div>
</div>
