<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img class="login_logo" src="{{ asset('img/logo.png') }}" alt="logo" style="width: 45%; margin: 0 auto; padding: 0;">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('新しいパスワードを設定したい場合、入力されたメールアドレス宛てにパスワード再設定用のリンクを送信します。') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('メールアドレス')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('パスワード再設定用のリンクを送信') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
