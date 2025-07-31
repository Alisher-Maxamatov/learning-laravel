<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fayl yuklash - Super Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Xabarlar -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Fayl yuklash formi -->
            <div class="bg-red-50 overflow-hidden shadow-sm sm:rounded-lg mb-6 border-2 border-red-200">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-red-600">📁 Yangi fayl yuklash</h3>

                    <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Fayl tanlang:
                            </label>
                            <input type="file" name="file"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   required>
                            <p class="text-gray-600 text-xs mt-1">Har qanday fayl turi. Maksimal: 5MB</p>
                        </div>

                        <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Faylni yuklash
                        </button>
                    </form>
                </div>
            </div>

            <!-- Yuklangan fayllar -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">📋 Yuklangan fayllar ({{ $uploads->count() }} ta)</h3>

                    @if($uploads->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 text-left">Fayl nomi</th>
                                    <th class="py-2 px-4 text-left">Turi</th>
                                    <th class="py-2 px-4 text-left">Hajmi</th>
                                    <th class="py-2 px-4 text-left">Sana</th>
                                    <th class="py-2 px-4 text-left">Amallar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($uploads as $upload)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">
                                            @if($upload->file_type === 'image')
                                                <div class="flex items-center">
                                                    <img src="{{ asset('storage/' . $upload->file_path) }}"
                                                         alt="{{ $upload->original_name }}"
                                                         class="w-12 h-12 object-cover rounded mr-2">
                                                    {{ $upload->original_name }}
                                                </div>
                                            @else
                                                <div class="flex items-center">
                                                    <span class="text-2xl mr-2">📄</span>
                                                    {{ $upload->original_name }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4">
                                                <span class="px-2 py-1 rounded text-xs
                                                    {{ $upload->file_type === 'image' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                                    {{ $upload->file_type }}
                                                </span>
                                        </td>
                                        <td class="py-2 px-4">{{ round($upload->file_size / 1024, 2) }} KB</td>
                                        <td class="py-2 px-4">{{ $upload->created_at->format('d.m.Y H:i') }}</td>
                                        <td class="py-2 px-4">
                                            <a href="{{ asset('storage/' . $upload->file_path) }}" target="_blank"
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs mr-1">
                                                Ko'rish
                                            </a>
                                            <form action="{{ route('upload.delete', $upload->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs"
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
                    @else
                        <p class="text-gray-600">Hali fayl yuklanmagan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
