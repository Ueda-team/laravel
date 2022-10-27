<x-app-layout>
    <x-slot name="header">
        <p>名前: {{$user->user_name}}</p>
        <p>ユーザーID: {{$user->user_id}}</p>
        <p>メールアドレス: {{$user->email}}</p>
        <p>認証: {{$user->email_verified_at}}</p>
        <p>アカウント作成日: {{$user->created_at}}</p>
        <p>アカウント更新日: {{$user->updated_at}}</p>
    </x-slot>
</x-app-layout>
