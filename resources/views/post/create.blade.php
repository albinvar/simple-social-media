<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    
    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
         <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div>
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            </div>

            <div class="mt-4">
                <x-jet-label for="body" value="{{ __('Description') }}" />
               <textarea rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow" name="body"> </textarea>
            </div>
            
            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Create Post') }}
                </x-jet-button>
            </div>
        </form>
 
    </div>
</div>
            
</x-app-layout>
