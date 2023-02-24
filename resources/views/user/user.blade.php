<x-app-layout>
    <div class="profile">
        <div class="profile-header">
            <img src="{!! $card !!}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-card.png') }}'">
        </div>
        <div class="profile-main">
            <div class="profile-main-header">
                <div class="profile-main-header-description">
                    <div class="profile-main-description-header-avatar">
                        <img src="{!! $avatar !!}" alt="" onError="this.onerror=null;this.src='{{ asset('img/no-icon.png') }}'">
                    </div>
                    <div class="profile-main-header-description-text">
                        <p class="profile-main-header-description-name">{{ $user->user_name }}</p>
                        <p class="profile-main-header-description-id">{{ '@'. $user->user_id }}</p>
                    </div>
                </div>
                <div class="profile-main-header-follow">
                    <a>Follow</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
