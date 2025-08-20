<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahsulotlar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <h1 class="text-2xl font-bold mb-6">Hush kelibsiz!</h1>

                    <a href="{{ route('customer.index') }}"
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        Davom etish
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
