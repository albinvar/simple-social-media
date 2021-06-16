<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	
	protected $post;

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    	$this->posts = Post::select('id')->withCount(['likes', 'comments'])->get();
    
        return view('profile', ['user' => $user, 'likes' => $this->countLikes(), 'comments' => $this->countComments(), 'posts' => $this->countPosts()]);
    }
    
    private function countPosts()
    {
    	return $this->posts->count();    
    }
    
    private function countLikes()
    {
        $postsArr = $this->posts->map(function (Post $post) {
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
        $postsArr = $this->posts->map(function (Post $post) {
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
