<div class="wrapper width: 100%;">
    <!--header-->
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


            <!--search-->
            <div class="search">
                <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                <form method="get" action="#" class="search_container">
                    <input type="text" size="30" placeholder="キーワード検索">
                    <input type="submit" value="&#xf002">
                </form>
            </div>
        </div><!--/logo-->
        <!--/search-->
        <!--/left-->
        <!--nav-->
        <ul class="menu">
            <li class="menu__single"><img src={{ asset("img/cart.png") }} alt="cart"></li>
            <li class="menu__single"><img src={{ asset("img/auction.png") }} alt="info"></li>
            <li class="menu__single"><img src={{ asset("img/heart.png") }} alt="auction"></li>
            <li class="menu__single"><img src={{ asset("img/bell.png") }} alt="iine"></li>
            <li class="menu__single">
                <a href="#" class="init-bottom"><img src={{ asset("img/human.png") }} alt="mypage"></a>
                <ul class="menu__second-level">
                    <li><a href="{{ url('dashboard') }}">ダッシュボード</a></li>
                    <li><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form></li>
                </ul>
            </li>
            <!-- 他グローバルナビメニュー省略 -->
        </ul>
        <nav class="navigation">
            <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li class="mypage-menu"></li>
                <ul class="header-dropdown">
                    <li><a href=""></a></li>
                    <li>

                    </li>
                </ul>
            </ul>
        </nav>
        <!--/nav-->
    </header>
    <!--header-->
    <!--header2-->
    <header class="header2">
        <!--left-->
        <div class="category-left">
        </div>
        <!--/left-->
        <!--right-->
        <div class="category-right">
        </div>
        <!--/right-->
    </header>
    <!--/header2-->
</div><!--/wrapper-->
