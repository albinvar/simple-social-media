<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

use Auth;

class Manage extends Component
{
	use WithPagination;
	
	public $postId;
  
    public function render()
    {
    	$posts = Post::where('user_id', Auth::id())->latest()->paginate(10);
        return view('livewire.posts.manage', ['posts' => $posts]);
    }
    
}
