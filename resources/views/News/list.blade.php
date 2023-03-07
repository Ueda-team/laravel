<x-app-layout>
    <div>
        @foreach($news as $body)
            <div>
                <h3>$body->title</h3>
            </div>
    </div>
</x-app-layout>
