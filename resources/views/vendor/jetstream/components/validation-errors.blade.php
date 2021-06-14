@if ($errors->any())
    <div {{ $attributes }}>
        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
