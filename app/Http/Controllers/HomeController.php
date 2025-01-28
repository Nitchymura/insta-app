<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;
    private $user;
    
    public function __construct(Post $post, User $user){

        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        if($request->search){
            //search results
            $home_posts = $this->post->latest()->where('description','LIKE', '%'.$request->search.'%')->get();
            //SELECT ＊FROM posts WHERE description LIKE '%searchword%'
            //RegEx
        }else{
            //normal home page
            $all_posts = $this->post->latest()->get();

            //show only posts buAuth user and followed users
            $home_posts = [];
            foreach($all_posts as $post){
                if($post->user_id == Auth::user()->id || $post->user->isFollowed()){
                    $home_posts []= $post;
                }
            }
        }
        return view('user.home')->with('all_posts', $home_posts)
                                ->with('suggested_users', $this->getSuggestedUsers())
                                ->with('search', $request->search);
        // return view('user.home', compact('all_post'));
    }


    //return list of suggested users
    private function getSuggestedUsers(){
        //get a list of all users
        $all_users = $this->user->all()->except(Auth::user()->id);

        $suggested_users = []; //empty array
        $count = 0;
        foreach($all_users as $user){
            //if user is not followed yet...
            if(!$user->isFollowed() && $count<10){
                //add the user to array
                $suggested_users [] = $user;
                $count++;
            }
        }
        //return the array of users
        return $suggested_users;
    }

    public function suggested(){
        $all_users = $this->user->all()->except(Auth::user()->id);

        $suggested_users = []; //empty array

        foreach($all_users as $user){
            //if user is not followed yet...
            if(!$user->isFollowed()){
                //add the user to array
                $suggested_users [] = $user;
            }
        }
        //return the array of users
        return view('user.profiles.suggestion')->with('suggested_users', $suggested_users);
    }
}
