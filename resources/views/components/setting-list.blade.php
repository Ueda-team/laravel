<div class="dashboard-wrapper">
    <div class="card">
        <div class="card-menu">
            <div class="card-menu-top">
                <p>設定</p>
            </div>
            <div class="card-menu-list">
                <ul>
                    <li><a href="{{ route('setting-account')  }}">プロフィール</a></li>
                    <li><a href="{{ route('setting-mail')  }}">メールアドレス</a></li>
                    <li><a href="{{ route('setting-password')  }}">パスワード</a></li>
                    <li><a href="{{ route('setting-notification')  }}">通知</a></li>
                    <li><a href="">ログアウト</a></li>
                    <li><a href="">アカウント削除</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <h2 class="setting-title">{{ $title }}</h2>
        {{ $slot }}
    </div>
</div>
