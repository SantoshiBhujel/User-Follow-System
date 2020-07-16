@if ($users->count())
    @foreach ($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('user',$user->id) }}">
                    {{ $user->name }}
                    </a>

                    <img class="card-img-top img-responsive" src="/storage/images/{{$user->profile_image}}" alt="">
                </h5>
                <small>
                    Following
                    <span class="bagde badge-primary">{{ $user->followings()->get()->count() }}</span>
                </small>
                <small>
                    Followers
                    <span class="bagde badge-primary follower">{{ $user->followers()->get()->count() }}</span>
                </small>
                
            </div>
            @if($user->id===auth()->user()->id)
                <a href=""><button class="btn btn-primary follow-button">View Profile</button></a>
            @else
                <button class="btn btn-primary follow-button" data-id="{{ $user->id }}" >
                    <strong>
                        @if(auth()->user()->isFollowing($user))
                            Unfollow
                        @else
                            Follow
                        @endif
                    </strong>
                </button>
            @endif
        </div>
    @endforeach
@else
<h1>No People YET!!!</h1>
@endif
