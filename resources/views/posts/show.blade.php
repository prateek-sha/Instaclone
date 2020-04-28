@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}"   class="w-100"  >
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img  class="rounded-circle w-100" src="{{$user->profile->profileimage() }}" alt="" style="max-width:50px
">
                </div>
            <div class="align-content-lg-start  p-0">
                <div class="font-weight-bold"> <a href="/profile/{{$user->id}}"> <span class="text-dark">{{ $user->username }}</span></a>
                    <a href="#" class="pl-3"> Follow</a>
                </div>
            </div>
            </div>
            <hr>
            <p><div class="font-weight-bold"> <a href="/profile/{{$user->id}}"><span class="text-dark"> {{ $user->username }}</span></a></div> {{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
