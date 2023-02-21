<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Topic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>

                    <form method="POST" action="{{ route('topic.create') }}">
                        @csrf
                        {{-- title --}}
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title"  />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- description --}}
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <br>
                            <x-primary-button class="ml-4" type="submit">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
