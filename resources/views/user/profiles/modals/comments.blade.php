<style>
    .modal-body{
        height:350px;
        overflow-y:scroll;
    }

</style>

<div class="modal fade" id="show-comments{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-secondary">
            <div class="modal-header border-secondary">
                <h3 class="h3 text-secondary">Recent Comments</h3>
            </div>
            <div class="modal-body px-3 ">
                <div class="mx-auto">
                    @forelse($user->comments->take(5) as $comment)
                        <div class="card mb-2 border-primary">
                            <div class="card-body px-3 text-secondary">
                                <div class="fw-bold">{{$comment->body}}</div> 
                                <hr class="">
                                <div class="">
                                    Replied to <span><a href="{{route('post.show', $comment->post->id)}}" class="text-decoration-none text-primary">{{$comment->post->user->name}}'s post</span></a>
                                </div>
                                {{-- <div class="mb-0 text-end">
                                    {{date('M d, Y H:m:s', strtotime($comment->created_at))}}
                                </div> --}}
                            </div>    
                        </div>
                    @empty 
                        <p class="text-secondary text-center">No comments yet.</p>
                                 
                    @endforelse      
                </div>
            </div> 
            <div class="modal-footer border-0">
                <button data-bs-dismiss="modal" type="button" class="btn btn-sm ms-auto btn-outline-secondary">Close</button>
            </div>        
        </div>
    </div>
</div>