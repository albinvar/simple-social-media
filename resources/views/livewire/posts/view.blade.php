<div>
	@forelse($posts as $post)
    <div class="flex flex-col my-5">
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                    	@foreach($post->postImages as $image)
                        <img src="{{ url('/storage/' . $image->path) }}"
                            alt="Social" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl" onContextMenu="return false;">
                        @endforeach
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                Posted by {{ $post->user->name }}
                            </div>
                            <h2 class="flex-auto text-lg font-medium">{{ $post->title }}</h2>
                        </div>
                        <p class="mt-3">{{ $post->body }}</p>
                        <div class="flex py-4  text-sm text-gray-600">
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="">Mumbai,MH</p>
                            </div>
                            <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                        <div class="flex space-x-3 text-sm font-medium">
                            <div class="flex-auto flex space-x-3">
                                <button
                                    class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 "
                                    wire:click="incrementLike({{ $post->id }})">
                                    @if($post->userLikes->count())
                                    <span class="text-green-400 hover:text-green-500 rounded-lg">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
								    <path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z" />
									</svg>
                                    </span>
                                    @else
                                    <span class="text-gray-400 hover:text-gray-500 rounded-lg">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
								    <path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z" />
									</svg>
                                    </span>
                                    @endif
                                    <span>{{ $post->likes->count() }}</span>
                                </button>
                            </div>
                            <button
                                class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                wire:click="comments({{ $post->id }})"
                                type="button" aria-label="like">Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
        
        {{ $posts->links() }}
        
       
         <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="isOpenCommentModal">
            <x-slot name="title">
                {{ __('Comments') }}
            </x-slot>

            <x-slot name="content">
            
            <form wire:submit.prevent="createComment({{ $postId }})" >
                <div class="mt-4" >
                    <x-jet-input type="text" class="mt-1 block" wire:model="comment"
                                placeholder="{{ __('Your comment') }}"
                                />

                    <x-jet-input-error for="comment" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('isOpenCommentModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:loading.attr="disabled">
                    {{ __('Post Comment') }}
                </x-jet-button>
                </form>
                </x-slot>
            
            <x-slot name="comments">
            @forelse($comments as $comment)
			<div class="flex space-x-2 my-3">
                <div class="block">
                  <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                    <div class="font-medium">
                      <a href="#" class="hover:underline text-sm">
                        <span class="text-xs font-semibold">{{ $comment->user->name }}</span>
                      </a>
                    </div>
                    <div class="text-xs">
                      {{ $comment->comment }}
                    </div>
                  </div>
                  <div class="flex justify-start items-center text-xs w-full">
                    <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                      <a href="#" class="hover:underline">
                        <small>Like</small>
                      </a>
                    <small class="self-center">.</small>
                      <a href="#" class="hover:underline">
                        <small>Reply</small>
                      </a>
                    <small class="self-center">.</small>
                      <a href="#" class="hover:underline">
                        <small>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              No Comments found
              @endforelse
              </x-slot>
        </x-jet-dialog-modal>

        
        
</div>
