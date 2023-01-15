<div class="wrapper width: 100%;">
    <header class="header width: 100%;
    display: flex;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);">
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
        <nav class="navigation">
            <ul>
                <li><a href="{{ url('login') }}">ログイン</a></li>
                <li><a href="{{ url('register') }}">会員登録</a></li>

            </ul>
        </nav>
    </header>
</div>
