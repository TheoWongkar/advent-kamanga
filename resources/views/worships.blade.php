<x-guest-layout>

    @if ($worships->count())
        <div class="container mx-auto py-10 px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($worships as $worship)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold">Gereja Masehi Advent Hari Ketujuh</h2>
                    <p class="text-md text-gray-500">Jl. Kamanga, Tompaso</p>
                    <div class="mt-4 flex items-center">
                        <div class="text-center mr-5">
                            <p class="text-4xl font-bold text-gray-800">
                                {{ \Carbon\Carbon::parse($worship->date)->format('d') }}</p>
                            <p class="text-sm">{{ \Carbon\Carbon::parse($worship->date)->format('M Y') }}</p>
                            <p class="text-red-600 text-md font-semibold">
                                {{ \Carbon\Carbon::parse($worship->date)->format('h:i') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">IBADAH</p>
                            <p class="text-lg font-semibold">{{ $worship->category }}</p>
                        </div>
                    </div>
                    <div class="mt-4 text-sm">
                        <p><strong>Rumah Keluarga: </strong><span class="text-gray-600">{{ $worship->name }}</span> </p>
                        <p><strong>Khotbah: </strong><span class="text-gray-600">{{ $worship->preacher }}</span> </p>
                        <p><strong>Singer: </strong><span class="text-gray-600">{{ $worship->singer }}</span> </p>
                        <p><strong>Tempat:</strong> <span class="text-gray-600">{{ $worship->place }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container mx-auto">
            <div class="flex items-center justify-center h-screen bg-white">
                <div class="text-center">
                    <svg class="mx-auto w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 11h4m-2-2v4m0 4h.01M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h1 class="mt-6 text-2xl font-semibold text-gray-800">Tidak Ada Ibadah!</h1>
                    <p class="mt-2 text-gray-600">Belum ada konten yang tersedia saat ini. Silakan cek kembali nanti.
                    </p>
                    <a href="/"
                        class="mt-6 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Kembali
                        ke Beranda</a>
                </div>
            </div>
        </div>
    @endif

    <!-- Pagination -->
    <div class="container mx-auto py-2 px-4">
        {{ $worships->links() }}
    </div>



</x-guest-layout>
