<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Reply') }}
        </h2>
    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>

                    <form method="POST" action="{{ route('topic.reply.store', $topic->id) }}">
                        @csrf
                        {{-- reply --}}
                        <div>
                            <x-input-label for="content" :value="__('Reply Content')" />
                            <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autofocus autocomplete="content"  />
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div>
                            <br>
                            <x-primary-button class="" type="submit">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>

                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
