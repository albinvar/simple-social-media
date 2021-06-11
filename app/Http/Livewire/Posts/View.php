<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use App\Models\Media;

class View extends Component
{
	
	public $posts;
	
    public function render()
    {
    	$this->posts = Post::all();
        return view('livewire.posts.view');
    }
}
