<x-app-layout>
    
<div class="container px-3 mx-auto grid bg-gray-100">
<style>
	input, textarea, button, select, a { -webkit-tap-highlight-color: rgba(0,0,0,0); }
	button:focus{ outline:0 !important; } }
	
</style>

    <!-- component -->
    	
    <div class="bg-white my-12 pb-6 w-full justify-center items-center overflow-hidden md:max-w-sm rounded-lg shadow-sm mx-auto">
      <div class="relative h-40">
        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1448932133140-b4045783ed9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80">
      </div>

      <div class="relative shadow mx-auto h-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
        <img class="object-cover w-full h-full" src="{{ $user->profile_photo_url }}">
      </div>

      <div class="mt-16">
        <h1 class="text-lg text-center font-semibold">
          {{ $user->name }} 
        </h1>
        <p class="text-sm text-gray-600 text-center">
          {{ '@' . $user->username }}
        </p>
      </div>

      <div class="mt-6 pt-3 flex flex-wrap mx-6 border-t">
        <div
		class="py-4 flex justify-center items-center w-full divide-x divide-gray-400 divide-solid">
			<span class="text-center px-4">
				<span class="font-bold text-gray-700">{{ $likes }}</span>
				<span class="text-gray-600">Likes</span>
			</span>
			<span class="text-center px-4">
				<span class="font-bold text-gray-700">{{ $comments }}</span>
				<span class="text-gray-600">Comments</span>
			</span>

			<span class="text-center px-4">
				<span class="font-bold text-gray-700">{{ $posts }}</span>
				<span class="text-gray-600">Posts</span>
			</span>
		</div>
      </div>
    </div>
</div>
            
</x-app-layout>
