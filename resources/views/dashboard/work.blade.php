<x-app-layout>
    <x-dashboard :user="$user" :pi="$pi" :title="$title">
        <div class="work_wrap">
            <a class="work_link" href="{{ route('work_add') }}">マーケットに出す</a>
            <a class="work_link" href="{{ route('auction_add') }}">オークションに出す</a>
            <p class="work_p">出品中の作品</p>

            <?php
            foreach ($works as $work){
                echo "<div class='tablewrap'>";
                echo "<img class='work_image' src='/img/sampleimage.png'>";
                echo "<table class='work_table'><tr><td>作品名</td><td>" . $work['title'] . "</td>";
                echo "<td>概要</td><td>". $work['outline'] . "</td></tr>";
                echo "<tr><td>プレビュー</td><td>" . $work['preview'] . "</td>";
                echo "<td>価格</td><td>" . $work['price'] . "</td></tr>";
                echo "<tr><td>出品日</td><td>" . $work['created_at'] . "</td></tr></table>";
                echo "</div>";
            }
            ?>
        </div>
    </x-dashboard>
</x-app-layout>
