<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile', ['user' => $user, 'likes' => $this->countLikes(), 'comments' => $this->countComments(), 'posts' => $this->countPosts()]);
    }
    
    private function countPosts()
    {
    	return Post::count();    
    }
    
    private function countLikes()
    {
        $posts = Post::withCount('likes')->get();
        $postsArr = $posts->map(function (Post $post) {
            $postbj = $post->toArray();
            $postObj['likes_count'] = $post->getAttribute('likes_count');
            return $postObj;
        });
        
        $count = 0;
        
        foreach ($postsArr as $post) {
            $count += $post['likes_count'];
        }
        
        return $count;
    }
    
    private function countComments()
    {
        $posts = Post::withCount('comments')->get();
        $postsArr = $posts->map(function (Post $post) {
            $postObj = $post->toArray();
            $postObj['comments_count'] = $post->getAttribute('comments_count');
            return $postObj;
        });
        
        $count = 0;
        
        foreach ($postsArr as $post) {
            $count += $post['comments_count'];
        }
        
        return $count;
    }
}
