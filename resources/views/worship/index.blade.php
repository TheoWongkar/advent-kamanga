<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ibadah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tambah dan Cari -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                        <!-- Tambah Ibadah -->
                        <a href="{{ route('ibadah.create') }}"
                            class="flex items-center bg-[#141652] hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition duration-200 text-sm md:text-base w-full md:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 mr-1">
                                <path fill-rule="evenodd"
                                    d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 0 1-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0 1 13.5 1.5H15a3 3 0 0 1 2.663 1.618ZM12 4.5A1.5 1.5 0 0 1 13.5 3H15a1.5 1.5 0 0 1 1.5 1.5H12Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 0 1 9 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0 1 16.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625v-12Z" />
                                <path
                                    d="M10.5 10.5a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963 5.23 5.23 0 0 0-3.434-1.279h-1.875a.375.375 0 0 1-.375-.375V10.5Z" />
                            </svg>
                            Tambah Ibadah
                        </a>

                        <!-- Cari Ibadah -->
                        <div class="flex space-x-2 w-full md:w-1/3">
                            <form action="{{ route('ibadah.index') }}" method="GET" class="flex w-full">
                                <input type="text" name="search" value="{{ $search }}"
                                    class=" px-4 py-2 w-full rounded-l-full border border-[#141652] focus:ring-0 focus:border-blue-800"
                                    placeholder="Cari berita..." autocomplete="off" autofocus />
                                <button type="submit"
                                    class="bg-[#141652] hover:bg-blue-800 text-white rounded-r-full px-4 py-2 flex items-center transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Pesan Berhasil -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded relative mb-3"
                            role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Tabel Ibadah -->
                    <div class="overflow-x-auto">
                        @if ($worships->count())
                            <table class="min-w-full bg-gray-100 rounded-xl shadow-md">
                                <thead class="bg-[#141652] text-white">
                                    <tr>
                                        <th
                                            class="text-center py-3 px-2 sm:px-2 uppercase font-semibold text-xs sm:text-sm">
                                            #
                                        </th>
                                        <th
                                            class="text-left py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            Kategori Ibadah
                                        </th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            Status
                                        </th>
                                        <th
                                            class="text-left py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            Nama Pemohon
                                        </th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            KHOTBAH
                                        </th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            SINGER
                                        </th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            TEMPAT
                                        </th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            TANGGAL</th>
                                        <th
                                            class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                            AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worships as $worship)
                                        <tr class="border-t hover:bg-blue-100 transition duration-200">
                                            <td class="py-4 px-2 sm:px-4 text-center">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-2 sm:px-4">{{ $worship->category }}</td>
                                            <td class="py-4 px-2 sm:px-4">
                                                <span
                                                    class="{{ $worship->status === 'Diarsipkan' ? 'bg-yellow-800 text-white' : 'bg-green-600 text-white' }} px-3 py-1 rounded-full text-sm font-medium">
                                                    {{ $worship->status }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-2 sm:px-4">{{ $worship->name }}</td>
                                            <td class="py-4 px-2 sm:px-4 text-center">{{ $worship->preacher }}</td>
                                            <td class="py-4 px-2 sm:px-4 text-center">{{ $worship->singer }}</td>
                                            <td class="py-4 px-2 sm:px-4 text-center">{{ $worship->place }}</td>
                                            <td class="py-4 px-2 sm:px-4 text-center">
                                                {{ \Carbon\Carbon::parse($worship->date)->format('d M Y') }}
                                            </td>
                                            <td class="py-4 px-2 sm:px-4 flex space-x-2 justify-center">
                                                <a href="{{ route('ibadah.edit', $worship->id) }}"
                                                    class="inline-flex items-center bg-yellow-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-yellow-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-4 mr-1">
                                                        <path
                                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                        <path
                                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                    </svg>
                                                    Ubah
                                                </a>
                                                <form action="{{ route('ibadah.destroy', $worship->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="inline-flex items-center bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-red-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm"
                                                        onclick="return confirm('Yakin ingin menghapus?');">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="size-4 mr-1">
                                                            <path fill-rule="evenodd"
                                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex flex-col items-center justify-center h-36">
                                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                                    <h1 class="text-xl font-bold text-red-600">Maaf, ibadah tidak ada</h1>
                                    <p class="mt-2 text-gray-600">Silakan cek kembali nanti!</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $worships->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
