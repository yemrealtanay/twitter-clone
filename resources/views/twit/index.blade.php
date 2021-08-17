<x-app-layout>

    <ol class="tweet-list">
        @foreach ($twits as $twit)
            <li class="tweet-card">
                <div class="tweet-content">
                    <div class="tweet-header">
                        <span class="fullname">
                            <strong> {{ $twit->user->name }}</strong>
                        </span>
                        <span class="username">{{ $twit->user->nickname }}</span>
                        <span class="tweet-time">- {{ $twit->date_create }}</span>
                    </div>
                    <a>
                        <img class="tweet-card-avatar" src="https://source.unsplash.com/random" alt="">
                    </a>
                    <div class="tweet-text">
                        <p class="" lang="es" data-aria-label-part="0"> {{ $twit->content }}

                        </p>
                    </div>
                    <div class="tweet-footer">
                        <a class="tweet-footer-btn">
                            <i class="octicon octicon-comment" aria-hidden="true"></i><span> 18</span>
                        </a>
                        <a class="tweet-footer-btn">
                            <i class="octicon octicon-sync" aria-hidden="true"></i><span> 64</span>
                        </a>
                        <a class="tweet-footer-btn">
                            <i class="octicon octicon-heart" aria-hidden="true"></i><span> 202</span>
                        </a>
                        <a class="tweet-footer-btn">
                            <i class="octicon octicon-mail" aria-hidden="true"></i><span> 155</span>
                        </a>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>





</x-app-layout>
