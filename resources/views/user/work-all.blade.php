<x-app-layout>
    <div class="workall_wrap">
        <a class="work_link" href="{{ url('/user/' .  Auth::user()->user_id . '/work/post') }}">出品する</a>
        <h2 class="workall_h2">出品作品一覧</h2>
        <ul>
            <?php
            foreach ($works as $work){
                echo "<li><a href='#'>";
                echo $work['title'] . "<br>";
                echo $work['outline'] . "<br>";
                echo $work['price'] . "円<br>";
                echo $work['preview'] . "view<br>";
                echo "</a></li>";
            }
            ?>

        </ul>

    </div>

</x-app-layout>
