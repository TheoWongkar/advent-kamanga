<x-guest-layout>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-72 sm:h-96"
        style="background-image: url('{{ asset('img/gmahk-kamanga.png') }}');">
        <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
        <div class="container mx-auto relative z-10 text-center text-white py-10 sm:py-20">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Gereja Masehi Advent Hari Ketujuh</h1>
            <p class="mt-4 text-sm sm:text-base">Sejarah dan kepercayaan GMAHK merupakan kisah keteguhan perjalanan umat
                manusia yang mengantarnya.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto py-10 space-y-10 px-4">
        <!-- Text Section -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-[#375E97]">Gereja global yang menguduskan hari ketujuh
                    sebagai hari Sabat.</h2>
            </div>
            <div>
                <p class="text-gray-700 text-sm sm:text-base">Didorong oleh kasih Yesus, ke dalam kehidupan kami, para
                    anggota jemaat di seluruh dunia percaya bahwa menguduskan hari ketujuh adalah perintah Allah yang
                    kekal. Kami menghormati Allah dengan cara memelihara hari Sabat sebagai hari perhentian dan
                    penyembahan.</p>
            </div>
        </section>

        <!-- Event Section -->
        <section
            class="flex flex-col md:flex-row items-center bg-[#375E97] text-white rounded-lg overflow-hidden shadow-lg">
            <div class="w-full md:w-1/2">
                <img src="img/lilin-ibadah.jpg" alt="Gambar Ibadah" class="w-full h-full object-cover">
            </div>
            <div class="w-full md:w-1/2 p-6 md:pl-6 text-center md:text-left">
                @if ($worship)
                    <h2 class="font-bold text-2xl mb-4">JADWAL IBADAH TERBARU</h2>
                    <h2 class="font-semibold text-xl mb-1">{{ $worship->title }}</h2>
                    <p class="text-base mb-2">{{ \Carbon\Carbon::parse($worship->date)->format('M Y') }}</p>
                    <p class="mb-1">Khotbah : {{ $worship->preacher }}</p>
                    <p class="mb-6">Singers : {{ $worship->singer }}</p>
                    <a href="/ibadah" class="bg-[#FB6542] hover:bg-orange-600 text-white py-2 px-4 rounded-xl">
                        Lihat Jadwal Lainnya...
                    </a>
                @else
                    <h2 class="font-bold text-2xl mb-4">JADWAL IBADAH TERBARU</h2>
                    <h2 class="font-semibold text-xl mb-1">Belum ada jadwal ibadah</h2>
                    <p class="mb-1">Khotbah : belum ada pengkhotbah</p>
                    <p class="mb-6">Singers : belum ada penyanyi</p>
                @endif
            </div>
        </section>

        <!-- Cards Section -->
        @if ($posts->count())
            @foreach ($posts as $post)
                <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="https://via.placeholder.com/300x200" alt="Image" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <p class="text-xs sm:text-sm text-gray-600">Date
                            </p>
                            <h4 class="text-base sm:text-lg font-bold text-gray-800">Lorem Ipsum Dolor Amet</h4>
                        </div>
                    </div>
                </section>
            @endforeach
        @else
            <section class="container mx-auto">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                        <h4 class="text-base sm:text-lg font-bold text-center">Belum ada berita.</h4>
                    </div>
                </div>
            </section>
        @endif
    </div>

</x-guest-layout>
