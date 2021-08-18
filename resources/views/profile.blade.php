<x-app-layout>
    <div class="container">
        <div class="row profile-background">
            <img src="{{ 'images/' . Auth::user()->bg_image_path }}" alt="">
        </div>
        <div class="avatar-container">
            <div class="avatar">
                <img class="avatar-container w-75" src=" {{ 'images/' . Auth::user()->image_path }}" alt="">
            </div>
        </div>
    </div>


    <nav class="navbar profile-stats">
        <div class="container">
            <div class="row">

                <div>
                    <ul>
                        <li class="profile-stats-item-active">
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Tweets</span>
                                <span
                                    class="profile-stats-item profile-stats-item-number">{{ Auth::user()->twits()->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Following</span>
                                <span
                                    class="profile-stats-item profile-stats-item-number">{{ Auth::user()->followings()->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Followers</span>
                                <span
                                    class="profile-stats-item profile-stats-item-number">{{ Auth::user()->followers()->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Likes</span>
                                <span class="profile-stats-item profile-stats-item-number">241</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="col profile-col">
        <!-- Left column -->
        <div class="profile-header">
            <!-- Header information -->
            <h3 class="profile-fullname"><a> {{ Auth::user()->name }}<a></h3>
            <h2 class="profile-element"><a>{{ Auth::user()->nickname }} </a></h2>
            <a class="profile-element profile-website" hrerf=""><i
                    class="octicon octicon-link"></i>{{ Auth::user()->email }} </a>
            <a class="profile-element profile-website" hrerf=""> {{ Auth::user()->website }}<i
                    class="octicon octicon-location"></i>{{ Auth::user()->location }}</a>
            <h2 class="profile-element"><i class="octicon octicon-calendar"></i>Joined {{ Auth::user()->created_at }}
            </h2>
            <a href="{{ route('users.edit', Auth::user()->id) }}" class="profile-element profile-website">Profilini
                Düzenle</a>
        </div>
    </div>

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
                        <img class="tweet-card-avatar" src="{{ 'images/' . Auth::user()->image_path }}" alt="">
                    </a>
                    <div class="tweet-text">
                        <p class="" lang="es" data-aria-label-part="0"> {{ $twit->content }}</p>
                    </div>
                    <div class="tweet-footer">
                        <a class="tweet-footer-btn">
                            <i class="octicon octicon-comment" aria-hidden="true"></i><span> 18</span>
                        </a>
                        <a class="tweet-footer-btn" href="{{ route('twits.retwit', $twit) }}">
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

    < </x-app-layout>
