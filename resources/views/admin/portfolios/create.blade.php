<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Portfolio Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.portfolios.store') }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="external_api_url" :value="__('External API URL (Optional)')" />
                            <x-text-input id="external_api_url" name="external_api_url" type="url" class="mt-1 block w-full" :value="old('external_api_url')" placeholder="https://api.example.com/data" />
                            <x-input-error class="mt-2" :messages="$errors->get('external_api_url')" />
                        </div>

                        <div>
                            <x-input-label for="thumbnail" :value="__('Thumbnail Image')" />
                            <input id="thumbnail" name="thumbnail" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                        </div>

                        <div>
                            <x-input-label for="order" :value="__('Sort Order')" />
                            <x-text-input id="order" name="order" type="number" class="mt-1 block w-full" :value="old('order', 0)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('order')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save Portfolio') }}</x-primary-button>
                            <a href="{{ route('admin.portfolios.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
