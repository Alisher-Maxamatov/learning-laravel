<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Panel - Mahsulotlar') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('admin.products.create') }}"
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Yangi Mahsulot
                </a>
                <a href="{{ route('admin.orders') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Buyurtmalar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rasm
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nomi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategoriya
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Narxi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amallar
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($product->image)
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                                 class="w-16 h-16 object-cover rounded">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-xs text-gray-500">Rasm yo'q</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        ${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                           class="text-indigo-600 hover:text-indigo-900 mr-3">Tahrirlash</a>
                                        <form method="POST" action="{{ route('admin.products.delete', $product) }}"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Rostdan ham o\'chirmoqchimisiz?')">
                                                O'chirish
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
