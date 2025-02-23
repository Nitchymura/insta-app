@if(!$post->trashed())
{{-- DEACTIVATE --}}
<div class="modal fade" id="deactivate-post{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h3 text-danger"><i class="fa-solid fa-eye-slash"></i> Hide Post</h3>
            </div>
            <div class="modal-body text-dark">
                <div class="fw-bold mb-3">   
                    Are you sure you want to hide this post?
                </div>
                <div>
                    <img src="{{$post->image}}" alt="" class=" img-lg">
                </div>
                <div>
                    <p class="text-secondary">{{$post->description}}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.posts.deactivate', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>

@else
{{-- ACTIVATE --}}
<div class="modal fade" id="activate-post{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h3 class="h3 text-primary"><i class="fa-solid fa-eye"></i> Unhide post</h3>
            </div>
            <div class="modal-body text-dark">
                <div class="fw-bold mb-3">
                    Are you sure you want to unhide this post?
                </div>
                <div>
                    <img src="{{$post->image}}" alt="" class="img-lg">
                </div>
                <div>
                    <p class="text-secondary">{{$post->description}}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.posts.activate', $post->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-primary">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endif