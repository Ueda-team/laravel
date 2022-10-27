<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
       <ul>
           <li><a href="#">出品管理</a></li>
           <li><a href="#">依頼管理</a></li>
           <li><a href="#">購入管理</a></li>
           <li><a href="#">ポートフォリオ</a></li>
           <li><a href="#">DM</a></li>
       </ul>
    </div>
</x-app-layout>
