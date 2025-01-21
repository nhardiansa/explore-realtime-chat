<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> --}}

                    <h2 class="text-4xl font-extrabold dark:text-white">
                        Chat Message
                    </h2>

                    <div
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white mt-4">
                        @foreach ($users as $user)

                        <a href="{{ route('chat-personal', $user) }}"
                            class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                            {{ $user->name }}
                        </a>
                        @endforeach

                    </div>

                    {{--
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
