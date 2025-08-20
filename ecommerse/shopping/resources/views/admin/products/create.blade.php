<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Yangi Mahsulot Qo'shish") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Mahsulot nomi</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategoriya</label>
                            <select name="category_id" id="category_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">Kategoriyani tanlang</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Narxi</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Tavsif</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Rasm --}}
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Rasm</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full">
                            @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <a href="{{ route('admin.dashboard') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Bekor qilish
                            </a>
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Saqlash
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto mt-6 bg-white shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Excel bilan ishlash</h3>


        <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="border rounded p-2" required>
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Import
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('admin.products.export') }}"
               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Export
            </a>
        </div>
    </div>
</x-app-layout>
