<x-app-layout>
    <x-setting-list :title="$title">
        <div class="setting-notification">
            @if(session('change'))
                <h3>保存しました</h3>
            @endif
        </div>
    </x-setting-list>
</x-app-layout>
