<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
	use WithFileUploads;
	
	public $title;
	
	public $body;

    public $photo;
	
	protected $rules = [
             'title' => 'required|max:250',
			 'body' => 'required|max:1000',
			 'photo' => 'image|max:1024',
	        ];
	
	
	public function submit()
	{
		$data = $this->validate();
		
		$this->photo->store('photos');
	}
	
    public function render()
    {
        return view('livewire.posts.create');
    }
}
