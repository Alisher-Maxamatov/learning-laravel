<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahsulotlar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Category Filter -->
            <div class="mb-6">
                <form method="GET" class="flex items-center space-x-4">
                    <select name="category" class="rounded-md border-gray-300">
                        <option value="">Barcha kategoriyalar</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                            @else
                                <div class="w-full h-48 bg-gray-200 mb-4 rounded flex items-center justify-center">
                                    <span class="text-gray-500">Rasm yo'q</span>
                                </div>
                            @endif

                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $product->category->name }}</p>
                            <p class="text-xl font-bold text-green-600 mb-4">${{ number_format($product->price, 2) }}</p>

                            @auth
                                <form method="POST" action="{{ route('order.place', $product) }}">
                                    @csrf
                                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Buyurtma berish
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded block text-center">
                                    Buyurtma berish uchun kiring
                                </a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
