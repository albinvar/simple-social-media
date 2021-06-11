<!-- component -->
<div class="container px-3 mx-auto grid bg-gray-100">
<style>
	input, textarea, button, select, a { -webkit-tap-highlight-color: rgba(0,0,0,0); }
	button:focus{ outline:0 !important; } }
	
</style>
@if(session()->has('success'))
<div class="bg-green-100 border my-3 border-green-400 text-green-700 dark:bg-green-700 dark:border-green-600 dark:text-green-100 px-4 py-3 rounded relative" role="alert">
  <span class="block sm:inline text-center">{{ session()->get('success') }}</span>
</div>
@endif

        @livewire('posts.view')
    
</div>
<script>
	
</script>