<x-app-layout>
    <div class="main-container">

        <div class="row profile-background">
            <img class="max-h-350 max-w-1200 w-100" src="{{ 'images/' . Auth::user()->bg_image_path }}" alt="">
          <div class="container">

            <div class="avatar-container">
              <div class="avatar">
                <img class="avatar-container w-75" src=" {{ 'images/' . Auth::user()->image_path }}" alt="">
              </div>
            </div>
          </div>
        </div>

        <nav class="navbar profile-stats">
            <div class="container">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col-6">
                        <ul>
                            <li class="profile-stats-item-active">
                                <a>
                                    <span class="profile-stats-item profile-stats-item-label">Tweets</span>
                                    <span class="profile-stats-item profile-stats-item-number">{{ Auth::user()->twits()->count() }}</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="profile-stats-item profile-stats-item-label">Following</span>
                                    <span class="profile-stats-item profile-stats-item-number">{{ Auth::user()->followings()->count() }}</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="profile-stats-item profile-stats-item-label">Followers</span>
                                    <span class="profile-stats-item profile-stats-item-number">{{ Auth::user()->followers()->count() }}</span>
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
                    <div class="col">

                    </div>
                </div>
            </div>
        </nav>
        <div class="container main-content">
            <div class="row">
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
                        <h2 class="profile-element"><i class="octicon octicon-calendar"></i>Joined {{ Auth::user()->created_at }}</h2>
                        <a href="{{ route('users.edit', Auth::user()->id) }}"
                            class="profile-element profile-website">Profilini Düzenle</a>
                        </div>
                    </div>
                <!-- End; Left column -->
                <!-- Center content column -->
                <div class="col-6">
                    <form action="{{ route('twits.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="">
                                <label class="text-bold m-2 text-xl text-gray-800" for="tweetFormControlTextarea1">Lets
                                    Tweet!</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                            </div>
                            <div class="d-flex justify-content-end my-1">
                                <button type="submit" class="btn btn-primary">Tweet</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('twits.index') }}">Twitleri Gör</a>

                    <ol class="tweet-list">
                        @foreach($twits as $twit)
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
                    <!-- End: tweet list -->
                </div>
                <!-- End: Center content column -->
                <div class="col right-col">
                    <div class="content-panel">
                        <div class="panel-header">
                            <h4>Who to follow</h4><small><a href="">Refresh</a></small><small><a href="">View all</a></small>
                        </div>
                        <!-- Who to Follow panel -->
                        <div class="panel-content">
                            <!--Follow list -->
                            <ol class="tweet-list">
                                @foreach($users as $user)
                                <li class="tweet-card">
                                    <div class="tweet-content">
                                        <img class="tweet-card-avatar" src="https://source.unsplash.com/random" alt="">
                                        <div class="tweet-header">
                                            <span class="fullname">
                                                <strong> {{ $user->name }}</strong>
                                            </span>
                                            <span class="username">{{ $user->nickname }}</span>
                                        </div>

                                        <a href="{{ route('users.follow', $user) }}" class="btn btn-follow">Follow</a>

                                    </div>
                                </li>
                                @endforeach
                            </ol>
                            <!--END: Follow list -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



</x-app-layout>
