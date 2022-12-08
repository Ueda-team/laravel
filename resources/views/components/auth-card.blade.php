<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-5">
    <div>
        <img class="login_logo" src="{{ asset('img/logo.png') }}" alt="logo" style="width: 10%; margin: 0 auto; padding: 0;">
    </div>

    <div class="w-full sm:max-w-md mb-11 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
