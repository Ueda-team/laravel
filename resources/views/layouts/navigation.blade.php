<header class="header">
    <!--left-->
    <div class="logo">
        <a href="/">
            <img src="{{ asset('img/logo.svg') }}" alt="ALTE">
        </a>


        <!--search-->
        <div class="search">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

            <form method="get" action="#" class="search_container">
                <label>
                    <input type="text" size="25" placeholder="キーワード検索">
                </label>
                <input type="submit" value="&#xf002">
            </form>
        </div>
    </div><!--/logo-->
    <!--/search-->
    <!--/left-->

    <!--nav-->
    <nav class="navigation">
        <ul>
            <li><a href=""><img src="./icon/カート.png" alt="cart"></a></li>
            <li><a href=""><img src="./icon/オークション.png" alt="info"></a></li>
            <li><a href=""><img src="./icon/ハート.png" alt="auction"></a></li>
            <li><a href=""><img src="./icon/ベル.png" alt="iine"></a></li>
            <li><a href="{{ url('/dashboard') }}"><img src="./icon/人物.png" alt="mypage"></a></li>
        </ul>
    </nav>
    <!--/nav-->
</header>
<!--header-->
