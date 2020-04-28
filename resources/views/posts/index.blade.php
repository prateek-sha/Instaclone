@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row pt-5">
        <div class="col-6 offset-3">
            <img src="/storage/{{ $post->image }}"   class="w-100"  >
        </div>
        <div class="row pt-2 p-md-4"></div>
        <div class="col-6 offset-3">

            <p><div class="font-weight-bold"> <a href="/profile/{{$user->id}}"><span class="text-dark"> {{ $user->username }}</span></a></div> {{ $post->caption }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
