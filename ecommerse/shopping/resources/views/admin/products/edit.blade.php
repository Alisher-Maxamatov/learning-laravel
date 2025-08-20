<!-- resources/views/admin/products/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahsulotni Tahrirlash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Mahsulot nomi</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
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
                                    <option
                                        value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                            <input type="number" step="0.01" name="price" id="price"
                                   value="{{ old('price', $product->price) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Tavsif</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                      required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Rasm</label>
                            @if ($product->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                         class="w-32 h-32 object-cover rounded">
                                    <p class="text-sm text-gray-600">Joriy rasm</p>
                                </div>
                            @endif
                            <input type="file" name="image" id="image"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                                Saqlash
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
