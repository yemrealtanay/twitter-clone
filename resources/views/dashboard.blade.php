<x-app-layout>
    <div class="main-container">
        <div class="container main-content">
            <div class="row">
                <!-- Center content column -->
                <div class="col-9">
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
