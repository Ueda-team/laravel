<div class="wrapper width: 100%;">
    <header class="header width: 100%;
    display: flex;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);">
        <!--left-->
        <div class="logo width: 40%;
    display: flex;
    margin: auto;
    padding: auto;">
            <a href="/">
                <img class=" width: 130px;
    margin: 0 10px;" src={{ asset("img/logo.png" ) }} alt="ALTE">
            </a>
            <div class="search">
                <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                <form method="get" action="#" class="search_container">
                    <input type="text" size="30" placeholder="キーワード検索">
                    <input type="submit" value="&#xf002">
                </form>
            </div>
        </div>
        <div class="menu-wrapper">
            <ul class="menu">
                <li class="menu__single"><a href="{{ route('cart') }}"><img src={{ asset("img/cart.png") }} alt="cart"></a></li>
                <li class="menu__single"><a href="{{ route('auctions') }}"><img src={{ asset("img/auction.png") }} alt="info"></a></li>
                <li class="menu__single"><img src={{ asset("img/heart.png") }} alt="auction"></li>
                <li class="menu__single"><img src={{ asset("img/bell.png") }} alt="iine"></li>
                <li class="menu__single">
                    <a href="#" class="init-bottom"><img src={{ asset("img/human.png") }} alt="mypage"></a>
                    <ul class="menu__second-level">
                        <li><a href="{{ url('/users/' .  Auth::user()->user_id) }}">プロフィール</a></li>
                        <li><a href="{{ url('dashboard') }}">ダッシュボード</a></li>
                        <li><a href="{{ url('setting') }}">設定</a></li>
                        <li><form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                            this.closest('form').submit();">{{ __('Log Out') }}</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div>
                <a href="{{ route('dashboard-work') }}" class="header-work_button">出品する</a>
            </div>
        </div>
    </header>
</div>
