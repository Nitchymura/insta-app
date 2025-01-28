<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post){
        $this->category = $category;
        $this->post = $post;
    }

    public function index(){
        $all_categories = $this->category->orderBy('name')->paginate(10);

        //count posts without category
        $all_posts = $this->post->all();
        $uncategorized_posts = 0;
        foreach($all_posts as $post){
            if($post->categoryPost->count() == 0)
                $uncategorized_posts++;
        }

        return view('admin.categories.index')->with('all_categories', $all_categories)
                                                ->with('uncategorized_count', $uncategorized_posts);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|max:50|unique:categories,name',
        ]);

        $this->category->name = $request->name; 
        
        $this->category->save();


        //redirect to previous page
        return redirect()->back();
    }

    public function delete($id){
        // $this->post->destroy($id);
        $this->category->findOrFail($id)->forceDelete();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name'.$id => 'required|max:50|unique:categories,name,'.$id
        ],[
            "category_name.$id.required" => 'The name is required.',
            "category_name.$id.max" => 'Maximum of 50 characters only.',
            "category_name.$id.unique" => 'The name already exists.'
        ]);

        $category_a = $this->category->findOrFail($id);

        $category_a->name = $request->input('category_name'.$id);

        $category_a->save();

        return redirect()->back();
    }
}
