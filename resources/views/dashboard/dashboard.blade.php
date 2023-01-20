<x-app-layout>
    <div class="dashboard-wrapper">
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
                        <li><a href="">出品管理</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">
            <h2>ダッシュボード</h2>
        </div>
    </div>
</x-app-layout>
