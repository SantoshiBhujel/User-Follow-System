@if ($users->count())
    @foreach ($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('user',$user->id) }}">
                    {{ $user->name }}
                    </a>
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
            <button class="btn btn-primary">
                <strong>
                    @if (auth()->user()->isFollowing($user))
                        Unfollow
                    @else
                        Follow
                    @endif
                </strong>
            </button>
        </div>
    @endforeach
@else
<h1>No People YET!!!</h1>
@endif
