<!-- resources/views/customer/orders.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mening buyurtmalarim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($orders->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mahsulot</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategoriya</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Narxi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vaqt</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->product->category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($order->product->price, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($order->status === 'approved') bg-green-100 text-green-800
                                                    @else bg-blue-100 text-blue-800 @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $order->created_at->format('d.m.Y H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">Sizda hali buyurtmalar yo'q.</p>
                        <a href="{{ route('customer.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Mahsulotlarga qaytish
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
