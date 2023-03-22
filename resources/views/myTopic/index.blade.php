<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Topic') }}
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-12  text-xl">

                <div class="font-bold underline underline-offset-4 col-span-6">
                    Topic Title

                </div>

                <div class="font-bold underline underline-offset-4 col-span-1 ">
                    Replies

                </div>
                <div class="font-bold underline underline-offset-4 col-span-2">
                    Topic Starter

                </div>
                <div class="font-bold underline underline-offset-4 col-span-2">
                    Last Action

                </div>
            </div>


            @foreach ($topic as $topic)
                <div class="py-4 ">

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 ">
                            <div class="grid grid-cols-12 grid-rows-1 gap-2">

                                <div class="font-semibold col-span-6">
                                    {{ $topic->title }}

                                </div>

                                <div class="font-light col-span-1">

                                    {{ $topic->reply_count }}
                                </div>
                                <div class="font-light  col-span-2">
                                    {{ $topic->user->name }}
                                </div>
                                <div class="font-light  col-span-2">
                                    {{-- {{ $topic->replies()->latest()->first()->created_at }} --}}
                                </div>

                                <div class='col-span-1'>
                                    <form action="{{ route('myTopic.destroy', ['id' => $topic->id, 'softdelete' => true])}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <x-primary-button>Delete</x-primary-button>
                                    </form>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 grid-rows-1 gap-2">

                                <div class="font-light col-span-6">
                                    {{ $topic->description }}

                                </div>
                            </div>

                        </div>
                    </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
