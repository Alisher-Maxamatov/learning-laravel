<!-- resources/views/admin/orders.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Buyurtmalar')}}</h2>
            <a href="{{route('admin.dashboard')}}"
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Dashboard</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{session('success')}}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($orders->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">

                                <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mijoz
                                    </th>
                                    <th class="px-6  py-3 text-left text-xs  font-medium text-gray-500 uppercase tracking-wider">
                                        Mahsulot
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kategoriya
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Narxi
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Vaqt
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amallar
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$order->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$order->user->name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$order->product->name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{$order->product->category->name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ${{number_format($order->product->price, 2)}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                                        <span class="px-2# Laravel E-commerce Sayt Yaratish
                                        </span>
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
