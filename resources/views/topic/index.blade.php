<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topic') }}
        </h2>
    </x-slot>

    {{-- <div class="py-4 grid grid-cols-11">
        <div class="col-end-12 col-span-2">
            <a href="{{ route('topic.create') }}">
                <x-primary-button>
                    Create topic
                </x-primary-button>
            </a>
        </div>
    </div> --}}

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="py-4 ">
                <a href="{{ route('topic.create') }}">
                    <x-primary-button>
                        Create
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-primary-button>
                </a>
            </div>


            <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-12  text-xl">

                <div class="font-bold underline underline-offset-4 col-span-6">
                    Topic Title

                </div>

                <div class="font-bold underline underline-offset-4 col-span-2 ">
                    Replies

                </div>
                <div class="font-bold underline underline-offset-4 col-span-2">
                    Topic Starter

                </div>
                {{-- <div class="font-bold underline underline-offset-4 col-span-2">
                    Last Action

                </div> --}}
            </div>

            @foreach ($topics as $topic)
                <a href="{{ route('topic.show', $topic->id) }}">
                    <div class="py-4 ">

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100 ">
                                <div class="grid grid-cols-12 grid-rows-1 gap-2">

                                    <div class="font-semibold col-span-6">
                                        {{ $topic->title }}

                                    </div>

                                    <div class="font-light col-span-2">

                                        {{ $topic->reply_count }}
                                    </div>
                                    <div class="font-light  col-span-2">
                                        {{ $topic->user->name }}
                                    </div>
                                    {{-- <div class="font-light  col-span-2">
                                        {{ $topic->last_action}}
                                    </div> --}}
                                </div>
                                <div class="grid grid-cols-12 grid-rows-1 gap-2">

                                    <div class="font-light col-span-6">
                                        {{ $topic->description }}

                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
    </div>
    </div>
    </div>
</x-app-layout>
