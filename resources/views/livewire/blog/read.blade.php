<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Create Blog Post') }}
    </x-slot>

    <x-slot name="description">
        {{ __('You can create blog posts from here, hit post when you\'re done') }}
    </x-slot>

    <x-slot name="form">
        <!-- Title -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title"
                autocomplete="title" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4" wire:ignore>
            <x-jet-label for="title" value="{{ __('Description') }}" />
            <trix-editor input="description" style="min-height: 300px;"></trix-editor>
            <x-jet-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

</x-jet-form-section>
