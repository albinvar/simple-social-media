<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Media;
use App\Models\Like;
use Auth;

class View extends Component
{
	use WithPagination;
	
	//public $posts;
	
    public function render()
    {
    	$posts = Post::with(['likes', 'userLikes'])->latest()->paginate(10);
        return view('livewire.posts.view', ['posts' => $posts]);
    }
    
    public function incrementLike(Post $post)
    {
	    $like = Like::where('user_id', Auth::id())
					->where('post_id', $post->id);
					
	    if(!$like->count())
		{
			$new = Like::create([
				'post_id' => $post->id,
				'user_id' => Auth::id(),
			]);
			
			return true;
		} else {
			$like->delete();
		}
    }
}
