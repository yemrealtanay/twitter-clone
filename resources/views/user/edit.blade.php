<x-app-layout>
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
                                <span class="profile-stats-item profile-stats-item-number">51</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Following</span>
                                <span class="profile-stats-item profile-stats-item-number">420</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="profile-stats-item profile-stats-item-label">Followers</span>
                                <span class="profile-stats-item profile-stats-item-number">583</span>
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
                    <a class="profile-element profile-website" hrerf=""><i
                            class="octicon octicon-location"></i>&nbsp;Vitoria-Gasteiz, Spain</a>
                    <h2 class="profile-element"><i class="octicon octicon-calendar"></i>Joined November 2012</h2>


                </div>
            </div>
            <!-- End; Left column -->
            <!-- Center content column -->
            <div class="col-6">
                <!-- Profile Edit Content -->

                <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="nickname" class="mt-3">Edit Your Nickname</label>
                    <input class="form-control form-control-lg" type="text" name="nickname"
                        placeholder="{{ $user->nickname }}">

                    <label for="bio" class="mt-3">Bio</label>
                    <textarea class="form-control" id="textarea" name="bio" rows="3"></textarea>

                    <label for="website" class="mt-3">Web Address</label>
                    <input class="form-control form-control-lg" type="text" name="website">

                    <label for="file_avatar" class="mt-3">Upload Avatar</label>
                    <input type="file" class="form-control-file" id="file_avatar" name="avatar" accept="image/*">

                    <label for="file_bg" class="mt-3">Upload Background</label>
                    <input type="file" class="form-control-file" id="file_bg" name="bgimg" accept="image/*">

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>




            </div>
            <!-- End: Center content column -->
            <div class="col right-col">
                <div class="content-panel">
                    <div class="panel-header">
                        <h4>Who to follow</h4><small><a href="">Refresh</a></small><small><a href="">View
                                all</a></small>
                    </div>
                    <!-- Who to Follow panel -->
                    <div class="panel-content">
                        <!--Follow list -->
                        <ol class="tweet-list">
                            <li class="tweet-card">
                                <div class="tweet-content">
                                    <img class="tweet-card-avatar"
                                        src="https://pbs.twimg.com/profile_images/679974972278849537/bzzb-6H4_bigger.jpg"
                                        alt="">
                                    <div class="tweet-header">
                                        <span class="fullname">
                                            <strong>Jon Vadillo</strong>
                                        </span>
                                        <span class="username">@JonVadillo</span>
                                    </div>

                                    <button class="btn btn-follow">Follow</button>
                                </div>
                            </li>
                            <li class="tweet-card">
                                <div class="tweet-content">
                                    <img class="tweet-card-avatar"
                                        src="https://pbs.twimg.com/profile_images/679974972278849537/bzzb-6H4_bigger.jpg"
                                        alt="">
                                    <div class="tweet-header">
                                        <span class="fullname">
                                            <strong>Jon Vadillo</strong>
                                        </span>
                                        <span class="username">@JonVadillo</span>
                                    </div>

                                    <button class="btn btn-follow">Follow</button>
                                </div>
                            </li>
                            <li class="tweet-card">
                                <div class="tweet-content">
                                    <img class="tweet-card-avatar"
                                        src="https://pbs.twimg.com/profile_images/679974972278849537/bzzb-6H4_bigger.jpg"
                                        alt="">
                                    <div class="tweet-header">
                                        <span class="fullname">
                                            <strong>Jon Vadillo</strong>
                                        </span>
                                        <span class="username">@JonVadillo</span>
                                    </div>

                                    <button class="btn btn-follow">Follow</button>
                                </div>
                            </li>
                        </ol>
                        <!--END: Follow list -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
