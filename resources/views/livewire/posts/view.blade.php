<div>
@if(session()->has('success'))
<div class="bg-green-100 border my-3 border-green-400 text-green-700 dark:bg-green-700 dark:border-green-600 dark:text-green-100 px-4 py-3 rounded relative" role="alert">
  <span class="block sm:inline text-center">{{ session()->get('success') }}</span>
</div>
@endif
@if(session()->has('error'))
<div class="bg-red-100 border my-3 border-red-400 text-red-700 dark:bg-red-700 dark:border-red-600 dark:text-red-100 px-4 py-3 rounded relative" role="alert">
  <span class="block sm:inline text-center">{{ session()->get('error') }}</span>
</div>
@endif
	@forelse($posts as $post)
    
      @include('elements.post')
      
    @empty
        <div class="flex flex-col my-12 md:mt-56 lg:mt-56">
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                        <img src="{{ asset('images/no-posts.png') }}"
                            alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            
                            <h2 class="flex-auto text-lg text-center font-medium">{{ __('No Posts found..!!!') }}</h2>
                        </div>
                        <p class="mt-3"></p>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforelse
        
        <div class="py-4 mb-2">
	        {{ $posts->links() }}
        </div>
        
       
        @include('elements.comments-post-modal')

        @include('elements.delete-post-modal')
        
</div>
