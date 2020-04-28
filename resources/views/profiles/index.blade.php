@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5" >
            <img class="rounded-circle w-75 " src="{{$user->profile->profileimage()}}"  alt="">       </div>

        <div class="col-9 pt-5" >
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                <div class="h4">{{$user->username}}</div>
                 <follow-button  user-id = "{{$user->id}}"   follows="{{ $follows }}"  > </follow-button>
                </div>
                @can('update',$user->profile)
            <a href="/p/create">Add new post</a>
                @endcan
            </div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit"> edit profile </a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong>  post</div>
                <div class="pr-3"><strong>{{ $user->profile->followers->count() }}</strong>  followers</div>
                <div class="pr-3"><strong>{{ $user->following->count() }}</strong>  following</div>
            </div>
            <div class="pt-4"> <strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#" >{{$user->profile->url  }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
