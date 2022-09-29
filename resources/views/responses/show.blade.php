<x-responses-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your survey') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Survey goes here
                    <code>
                        <ul>
                            <li>If not started, show start screen</li>
                            <li>Else show current questions</li>
                        </ul>
                    </code>
                </div>
            </div>
        </div>
    </div>
</x-responses-layout>