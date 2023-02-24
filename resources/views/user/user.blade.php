<x-app-layout>
    <div class="user_wrapper">
        <div class="profile_wrapper">
            <div class="profile_left">
                <img src={{ asset("img/no-icon.png") }}>
            </div>
            <div class="profile_right">
                <h2>名前: {{$user->user_name}}</h2>
                <p>ユーザーID: {{$user->user_id}}</p>
                <p>メールアドレス: {{$user->email}}</p>
                <p>認証: {{$user->email_verified_at}}</p>
                <p>アカウント作成日: {{$user->created_at}}</p>
                <p>アカウント更新日: {{$user->updated_at}}</p>
            </div>
        </div>
        <div class="user_detail">

        </div>
    </div>
</x-app-layout>
