<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.links.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="url" :value="__('URL')" />
                            <x-text-input id="url" name="url" type="url" class="mt-1 block w-full" :value="old('url')" required placeholder="https://example.com" />
                            <x-input-error class="mt-2" :messages="$errors->get('url')" />
                        </div>

                        <div>
                            <x-input-label for="icon" :value="__('Icon (FontAwesome class or Emoji)')" />
                            <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" :value="old('icon')" placeholder="fas fa-link or 🔗" />
                            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                        </div>

                        <div>
                            <x-input-label for="order" :value="__('Sort Order')" />
                            <x-text-input id="order" name="order" type="number" class="mt-1 block w-full" :value="old('order', 0)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('order')" />
                        </div>

                        <div class="block">
                            <label for="is_active" class="inline-flex items-center">
                                <input id="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('Active') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save Link') }}</x-primary-button>
                            <a href="{{ route('admin.links.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
