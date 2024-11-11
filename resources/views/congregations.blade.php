<x-guest-layout>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold">Data Jemaat</h1>
        <h2 class="text-md mb-6">GMAHK Kamanga</h2>

        @if ($congregations->count())
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 bg-gray-200 text-center text-gray-600 text-sm font-semibold uppercase">
                                No
                            </th>
                            <th class="py-3 px-6 bg-gray-200 text-left text-gray-600 text-sm font-semibold uppercase">
                                Nama
                            </th>
                            <th class="py-3 px-6 bg-gray-200 text-center text-gray-600 text-sm font-semibold uppercase">
                                Jenis
                                Kelamin</th>
                            <th class="py-3 px-6 bg-gray-200 text-center text-gray-600 text-sm font-semibold uppercase">
                                Usia
                            </th>
                            <th class="py-3 px-6 bg-gray-200 text-center text-gray-600 text-sm font-semibold uppercase">
                                Alamat</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($congregations as $congregation)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-4 px-6 text-center">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6">{{ $congregation->name }}</td>
                                <td class="py-4 px-6 text-center">{{ $congregation->gender }}</td>
                                <td class="py-4 px-6 text-center">{{ $congregation->age }} thn</td>
                                <td class="py-4 px-6">{{ $congregation->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                        <h1 class="mt-6 text-2xl font-semibold text-gray-800">Tidak Ada Jemaat!</h1>
                        <p class="mt-2 text-gray-600">Belum ada konten yang tersedia saat ini. Silakan cek kembali
                            nanti.
                        </p>
                        <a href="/"
                            class="mt-6 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Kembali
                            ke Beranda</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="container mx-auto py-2 px-4">
        {{ $congregations->links() }}
    </div>

</x-guest-layout>
