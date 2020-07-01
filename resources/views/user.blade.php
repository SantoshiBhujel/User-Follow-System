@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $user->name }}
                <nav>

                    <div class="nav nav-tabs" id="nav-tab" role="tablist">

                        <a href="" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab">Follower <span>{{ $user->followers()->get()->count() }}</span></a>
                        <a href="" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab">Following<span>{{ $user->followings()->get()->count() }}</span></a>

                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-columns">
                            {{-- {{ $user->followers }} --}}
                            @include('users',['users'=>$user->followers])
                        </div>
                    </div>

                    <div class="tab-pane fade" id="following" role="tabpanel" aria-label="nav-profile-tab">
                        <div class="card-columns">
                            @include('users',['users'=>$user->followings])
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection