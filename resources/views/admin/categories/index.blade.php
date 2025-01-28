@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')


        <form action="{{route('admin.categories.store')}}" method="post" class="row gx-2 mb-4">
        @csrf       

                    <div class="col-4">
                        {{-- <label for="name" ></label> --}}
                        <input type="text" name="name" id="name" class="form-control " placeholder="Add a category..." value="{{old('name')}}">
                        @error('name')
                            <p class="mb-0 text-danger small">{{$message}}</p>
                        @enderror
                    </div>     
                    <div class="col-auto">
                        <button type="submit" class="btn  btn-primary "><i class="fa-solid fa-plus"></i> Add</button>
                    </div> 

   
        </form>



    <table class="table border bg-white table-hover align-middle text-secondary text-center">
        <thead class="table-warning text-secondary text-uppercase small">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Count</th>
                <th>Last Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($all_categories as $category)
                <tr >
                    <td >
                        {{$category->id}}
                    </td>
                    <td class="text-dark">
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->categoryPost->count()}}
                    </td>
                    <td>
                        @if($category->updated_at > '2000-01-01 00:00:00')
                            {{date('M d, Y H:m:s', strtotime($category->updated_at))}}
                        @endif
                    </td>
                    <td>
                        <div class="m-auto">
                            {{-- edit --}}
                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit-category{{$category->id}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            &nbsp;
                            {{-- delete --}}
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-category{{$category->id}}">
                                <i class="fa-solid fa-trash "></i>
                            </button>



                        </div>

                        @include('admin.categories.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">No categories found.</td>
                </tr>
            @endforelse
            <tr>
                <td>0</td>
                <td>Uncategorized</td>
                <td>{{$uncategorized_count}}</td>
                <td></td><td></td>
            </tr>
        </tbody>
    </table>
    {{ $all_categories->links() }}


@endsection