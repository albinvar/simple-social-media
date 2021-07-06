
    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-11/12 lg:w-full md:w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg mb-12">
         <x-jet-validation-errors class="mb-4" />

        <form method="POST" wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            
            <div>
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 mb-2 w-full" type="text" wire:model="title" />
            </div>
            
            <div>
                <x-jet-label for="location" value="{{ __('Location') }}" />
                <x-jet-input id="location" class="block mt-1 w-full" type="text" wire:model="location" />
            </div>

            <div class="mt-4">
                <x-jet-label for="body" value="{{ __('Description') }}" />
               <textarea rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow" wire:model="body"> </textarea>
            </div>
            
            @if($file)
            <div class="mt-4">
                <x-jet-label value="{{ __('Preview :') }}" />
                
               @if(in_array($file->extension(), $this->imageFormats))
               <img class="p-3 h-32" src="{{ $file->temporaryUrl() }}" oncontextmenu="return false;">
               @elseif(in_array($file->extension(), $this->videoFormats))
               <video controls crossorigin playsinline oncontextmenu="return false;" controlsList="nodownload" class="rounded-lg filter" >
			                <!-- Video files -->
			                <source src="{{ $file->temporaryUrl() }}" type="video/{{ $file->extension() }}" size="576">
			
			                <!-- Fallback for browsers that don't support the <video> element -->
			                <a href="{{ $file->temporaryUrl() }}" download>Download</a>
			            </video>
			   @else
			
				<p class="text-red-700 text-sm my-3">Invalid File selected. You can only upload {{ implode(', ',  array_merge($this->imageFormats, $this->videoFormats)) }} file types. </p>
				
               @endif
            </div>
            @endif
            
            
         <div
		    x-data="{ isUploading: false, progress: 0 }"
		    x-on:livewire-upload-start="isUploading = true"
		    x-on:livewire-upload-finish="isUploading = false"
		    x-on:livewire-upload-error="isUploading = false"
			x-on:livewire-upload-progress="progress = $event.detail.progress"
			>
            
            <div class="mt-4">
                <x-jet-label for="body" value="{{ __('Media') }}" />
               <input type="file" wire:model="file">
            </div>
            
            
            
            <div wire:loading class="my-3" wire:target="file">Uploading...</div>
            
	        <!-- Progress Bar -->
		    <div x-show="isUploading" class="my-2">
		        <progress max="100" x-bind:value="progress"></progress>
		    </div>
		</div>
            
            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Create Post') }}
                </x-jet-button>
            </div>
            
        </form>
 
    </div>
</div>
            
