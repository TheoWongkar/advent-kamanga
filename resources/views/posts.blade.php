<x-guest-layout>
    @if ($posts->count())
        <div class="container mx-auto py-10 px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <!-- Card 1 -->
                <div class="bg-white border rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300x150" alt="Berita" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <span
                            class="inline-block px-3 py-1 text-xs font-semibold text-white bg-{{ $post->category->color }}-600 rounded-full mb-2">{{ $post->category->category }}</span>
                        <p class="text-sm">{{ $post->updated_at->diffForHumans() }}</p>
                        <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
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
                    <h1 class="mt-6 text-2xl font-semibold text-gray-800">Tidak Ada Berita!</h1>
                    <p class="mt-2 text-gray-600">Belum ada konten yang tersedia saat ini. Silakan cek kembali nanti.
                    </p>
                    <a href="/"
                        class="mt-6 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Kembali
                        ke Beranda</a>
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>
