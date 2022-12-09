<x-app-layout>
    <div class="work_wrap">
        <a class="work_link" href="{{ url('/user/' .  Auth::user()->user_id . '/work/post') }}">出品する</a>
        <p class="work_p">出品中の作品</p>

        <?php
        foreach ($works as $work){
            echo "<div class='tablewrap'>";
            echo "<table class='work_table'><tr><td>作品名</td><td>" . $work['title'] . "</td>";
            echo "<td>概要</td><td>". $work['outline'] . "</td></tr>";
            echo "<tr><td>プレビュー</td><td>" . $work['preview'] . "</td>";
            echo "<td>価格</td><td>" . $work['price'] . "</td></tr>";
            echo "<tr><td>出品日</td><td>" . $work['created_at'] . "</td></tr></table>";
            echo "</div>";
        }
        ?>
    </div>




</x-app-layout>
