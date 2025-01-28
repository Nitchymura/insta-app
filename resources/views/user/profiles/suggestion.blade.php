@extends('layouts.app')

@section('title', 'Suggestion')

@section('content')


    <div class="row justify-content-center" >
        <div class="col-6" >
            <h4 class="h3 text-start text-secondary fw-bold mb-4">Suggested</h4>

            @foreach($suggested_users as $user)
                <div class="row mb-3 ">
                    <div class="col-auto my-auto" >
                        {{-- icon/avatar --}}
                        <a href="{{route('profile.show', $user->id)}}">
                            @if($user->avatar)
                                <img src="{{$user->avatar}}" alt="" class="rounded-circle avatar-md">
                            @else
                                 <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col-6  text-truncate">
                        {{-- name --}}
                        <div class="row fw-bold">
                            {{$user->name}}
                        </div>
                        <div class="row fw-bold">
                            {{$user->email}}
                        </div>
                        <div class="row text-secondary">
                            @if($user->followingMe())
                                Follows you
                            @elseif($user->followers->count()==0)
                                No followers yet
                            @elseif($user->followers->count()==1)
                                1 follower
                            @else
                               {{$user->followers->count()}} followers

                            @endif
                        </div>                      
                    </div>
                    <div class="col-auto text-end my-auto">
                        {{-- follow --}}
                        <form action="{{route('follow.store', $user->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn  bg-transparent text-primary">Follow</button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection