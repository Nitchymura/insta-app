@extends('layouts.app')

@section('title', $user->name. ' - Following')

@section('content')
    @include('user.profiles.header')

    @if($user->follows->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-4">
                <h4 class="h5 text-center text-secondary">Following</h4>

                @foreach($user->follows as $following)
                    <div class="row mb-3 align-items-center">
                        <div class="col-auto">
                            {{-- icon/avatar --}}
                            <a href="{{route('profile.show', $following->followed->id)}}">
                                @if($following->followed->avatar)
                                    <img src="{{$following->followed->avatar}}" alt="" class="rounded-circle avatar-sm">
                                @else
                                     <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            {{-- name --}}
                            <a href="{{route('profile.show', $following->followed->id)}}" class="text-decoration-none text-dark fw-bold">
                                {{$following->followed->name}}
                            </a>
                        </div>
                        <div class="col-auto">
                            {{-- button --}}
                            @if($following->followed->id != Auth::user()->id)
                                @if($following->followed->isFollowed())
                                    {{-- unfollow --}}
                                    <form action="{{route('follow.delete', $following->followed->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 bg-transparent text-secondary">Following</button>
                                    </form>
                                @else  
                                    {{-- follow --}}
                                    <form action="{{route('follow.store', $following->followed->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn p-0 bg-transparent text-primary">Follow</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h4 class="h5 text-center text-secondary">No following yet.</h4>
    @endif

@endsection