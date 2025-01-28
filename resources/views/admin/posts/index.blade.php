@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
{{-- SEARCH --}}

    <form action="{{route('admin.posts')}}" method="get">
        <input type="text" name="search" placeholder="Search posts" class="form-control form-control-sm w-25 ms-auto mb-3" value="{{$search}}">
    </form>


    <table class="table border bg-white table-hover align-middle text-secondary">
        <thead class="table-primary text-secondary text-uppercase small">
            <tr>
                <th></th>
                <th></th>
                <th>Category</th>
                <th>Owner</th>
                <th>Created at</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($all_posts as $post)
                <tr>
                    <td class="text-center">
                        {{$post->id}}
                    </td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" ><img src="{{$post->image}}" alt="" class="img-lg"></a>
                    </td>
                    <td>
                        {{-- categories --}}
                        @forelse($post->categoryPost as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                {{$category_post->category->name}}
                            </div>
                        @empty
                            <div class="text-secondary">Uncategorized</div>
                        @endforelse
                    </td>
                    <td>
                        <a href="{{route('profile.show', $post->user_id)}}" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
                    </td>
                    <td>
                        {{date('M d, Y H:m:s', strtotime($post->created_at))}}
                    </td>
                    <td>
                        {{-- status --}}
                        @if($post->trashed())
                            <i class="fa-solid fa-circle-minus text-secondary"></i> Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> Visible
                        @endif

                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown"> 
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if($post->trashed())
                                    {{-- activate --}}
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#activate-post{{$post->id}}">
                                        <i class="fa-solid fa-eye"></i> Activate Post {{$post->id}}
                                    </button>
                                @else
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-post{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash"></i> Hide Post {{$post->id}}
                                    </button>
                                @endif
                            </div>                         
                        </div>
                        @include('admin.posts.status')
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $all_posts->links() }}


@endsection