<x-app-layout>
    <div class="news_wrapper">
        <h2>NEWS</h2>
        <div class="news_top">
            <p class="news_title">{{ $news->title }}</p>
            <p>{{ $news->created_at }}</p>
        </div>
        <p class="news_detail">{{ $news->detail }}</p>
        </div>
    </div>
</x-app-layout>
