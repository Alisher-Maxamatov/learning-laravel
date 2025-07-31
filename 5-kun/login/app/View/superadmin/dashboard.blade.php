<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Super Admin Panel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-50 overflow-hidden shadow-sm sm:rounded-lg border-2 border-red-200">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4 text-red-600">🔥 SUPER ADMIN PANEL 🔥</h1>
                    <p class="text-lg mb-4">Sizning rolingiz: <span class="font-bold text-red-700">{{ auth()->user()->role }}</span></p>

                    <div class="mt-6">
                        <h3 class="text-xl font-semibold mb-4 text-red-600">Super Admin funksiyalari:</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-semibold text-lg mb-2">Tizim nazorati</h4>
                                <ul class="list-disc list-inside text-gray-700">
                                    <li>Barcha adminlarni boshqarish</li>
                                    <li>Foydalanuvchilarni o'chirish/yaratish</li>
                                    <li>Tizim sozlamalarini o'zgartirish</li>
                                </ul>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-semibold text-lg mb-2">Ma'lumotlar</h4>
                                <ul class="list-disc list-inside text-gray-700">
                                    <li>Barcha hisobotlar</li>
                                    <li>Database backup</li>
                                    <li>Log fayllarini ko'rish</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('superadmin.upload') }}"
                           class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mr-2">
                            📁 Fayl yuklash
                        </a>
                        <a href="/admin" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Admin panelga o'tish
                        </a>
                        <a href="/dashboard" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Dashboard ga o'tish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
