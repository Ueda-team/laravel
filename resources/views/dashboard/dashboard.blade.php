<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard_nav">
       <ul>
           <li><a href="{{ url('/user/' .  Auth::user()->user_id . '/works') }}">出品管理</a></li>
           <li><a href="#">依頼管理</a></li>
           <li><a href="#">購入管理</a></li>
           <li><a href="#">ポートフォリオ</a></li>
           <li><a href="#">DM</a></li>
       </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>



</x-app-layout>
