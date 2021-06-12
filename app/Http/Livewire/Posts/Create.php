<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Media;
use Stevebauman\Location\Facades\Location;

class Create extends Component
{
	use WithFileUploads;
	
	public $title;
	
	public $body;

    public $photo;
    
    public $location;
	
	protected $rules = [
             'title' => 'required|max:250',
             'location' => 'required|max:250',
			 'body' => 'required|max:1000',
			 'photo' => 'image|max:1024',
	        ];
	
	public function mount()
	{
		$position = Location::get();
		if ($position){
			 $this->location = $position->cityName . '/' . $position->regionCode;
		} else {
			$this->location = null;
		}
	}
	
	
	public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }
	
	public function submit()
	{
		$data = $this->validate();
		
		$post = Post::create([
			'user_id' => auth()->id(),
			'title' => $data['title'],
			'location' => $data['location'],
			'body' => $data['body'],
		]);
		
		$path = $this->photo->store('post-photos', 'public');
		
		$media = Media::create([
			'post_id' => $post->id,
			'path' => $path,
			'is_image' => true,
		]);
		
		session()->flash('success', 'Post created successfully');
		
		return redirect('dashboard');
	}
	
    public function render()
    {
        return view('livewire.posts.create');
    }
    
}
