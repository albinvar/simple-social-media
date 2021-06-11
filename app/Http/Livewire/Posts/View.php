<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Media;

class View extends Component
{
	use WithPagination;
	
	//public $posts;
	
    public function render()
    {
    	$posts = Post::latest()->paginate(10);
        return view('livewire.posts.view', ['posts' => $posts]);
    }
}
