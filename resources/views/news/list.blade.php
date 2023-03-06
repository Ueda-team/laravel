<x-app-layout>
    <div class="news_wrapper">
        <h2>NEWS</h2>
        @foreach($newsall as $one)
            <p>{{ $one->title }}</p>
        @endforeach
    </div>
    </div>
</x-app-layout>
