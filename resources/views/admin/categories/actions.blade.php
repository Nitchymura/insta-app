{{-- DELETE --}}
<div class="modal fade" id="delete-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h3 text-dark"><i class="fa-solid fa-trash-can"></i> Delete Category</h3>
            </div>
            <div class="modal-body text-dark text-start">
                <div>   
                    Are you sure you want to delete <span class="fw-bold">{{$category->name}}</span> category?
                </div>
                <br>
                <div>   
                    This action will affect all the posts under this category. Posts without a category will fall under Uncategorized.
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.categories.delete', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- EDIT --}}
<div class="modal fade" id="edit-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h3 text-dark"><i class="fa-regular fa-pen-to-square"></i> Edit Category</h3>
            </div>
            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body text-dark">
                    <input type="text" name="category_name{{ $category->id }}" value="{{ old('category_name'.$category->id, $category->name)}}" id="" class="form-control">
                    {{-- <textarea name="category_name{{$category->id}}" id="" rows="1" class="form-control ">{{old('category_name'.$category->id, $category->name)}}</textarea> --}}
                        @error('category_name'.$category->id)
                        <p class="mb-0 text-danger small">{{$message}}</p>
                        @enderror
                
                    
                </div>
                <div class="modal-footer border-0">
                    
                        <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-warning">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>

                </div>
            </form>            
        </div>
    </div>
</div>