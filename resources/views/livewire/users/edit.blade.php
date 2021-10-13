<div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" wire:submit.prevent="submit">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name" />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" wire:model.lazy="username" />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model.lazy="email" />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="is_private" value="{{ __('Account visibility') }}" />
                <select id="is_private" class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full" wire:model.lazy="is_private">
                	<option value="0">Public</option>
	                <option value="1">Private</option>
                <select>
            </div>
            
            <div class="mt-4">
                <x-jet-label for="is_private" value="{{ __('Account Role') }}" />
                <select id="is_private" class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full" wire:model.lazy="role_id">
                	<option value="1">User</option>
	                <option value="2">Admin</option>
                <select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="Use Default password" name="password" wire:model.lazy="password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"  wire:model.lazy="password_confirmation" model="password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</div>
