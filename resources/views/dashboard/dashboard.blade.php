<x-app-layout>
    <x-dashboard :user="$user" :pi="$pi" :title="$title" :avatar="$avatar">
            <div class="article_wrapper">
                <div class="news">
                    <h2 class="dashboard_news">ニュース</h2>
                    @foreach($news as $body)
                        <a href=" {{ url('/news/' . $body->id) }}"><p>{{ $body->title }}</p></a>
                    @endforeach
                </div>
                <div class="myproject">
                    <h2 class="dashboard_project">進行中の案件</h2>
                    <div class="projects">
                        <div class="talk">
                            <p class="talk_p">トークルーム</p>
                            <div class="talkroom">
                                <div class="message1">
                                    <p>取引中</p>
                                    <div class="number">
                                        <p class="messagenumber">0</p><p>件</p>
                                    </div>
                                </div>
                                <div class="message2">
                                    <p>評価待ち</p>
                                    <div class="number">
                                        <p class="messagenumber">0</p><p>件</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="est">
                            <p class="est_p">見積り</p>
                            <div class="estimate">
                                <div class="message3">
                                    <p>提案待ち</p>
                                    <div class="number">
                                        <p class="messagenumber">0</p><p>件</p>
                                    </div>
                                </div>
                                <div class="message4">
                                    <p>提案中</p>
                                    <div class="number">
                                        <p class="messagenumber">0</p><p>件</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </x-dashboard>

</x-app-layout>
