<header class="bg-[#375E97] text-white" x-data="{ isOpen: false }">
    <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
        <div class="flex items-center space-x-4">
            <div class="flex items-center text-white mr-3 leading-none">
                <img src="https://w7.pngwing.com/pngs/600/819/png-transparent-seventh-day-adventist-church-christian-church-christianity-pastor-adventism-others-miscellaneous-christianity-leaf-thumbnail.png"
                    alt="Logo" class="h-10 mr-4">
                <div>
                    <p class="text-md font-semibold tracking-wide">Gereja Masehi Advent</p>
                    <p class="text-md font-semibold tracking-wide">Hari Ketujuh di Indonesia</p>
                    <p class="text-xs">Jemaat Kamanga Tompaso | Minahasa</p>
                </div>
            </div>
            <!-- Desktop Menu -->
            <nav class="hidden lg:flex space-x-3">
                <a href="#" class="hover:underline">Beranda</a>
                <a href="#" class="hover:underline">Tentang Kami</a>
                <a href="#" class="hover:underline">Ibadah</a>
                <a href="#" class="hover:underline">Berita</a>
                <a href="#" class="hover:underline">Jemaat</a>
            </nav>
        </div>
        <div class="hidden lg:flex space-x-2">
            <button class="bg-[#FFBB00] hover:bg-yellow-500 px-4 py-2 rounded text-sm">Login</button>
            <button class="bg-[#FB6542] hover:bg-orange-600 px-4 py-2 rounded text-sm">Daftar</button>
        </div>
        <!-- Hamburger Button (visible on smaller screens) -->
        <button @click="isOpen = !isOpen" class="lg:hidden flex items-center px-4 py-2">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" class="lg:hidden">
        <nav class="flex flex-col items-start space-y-2 p-4">
            <a href="#" class="hover:underline">Beranda</a>
            <a href="#" class="hover:underline">Tentang Kami</a>
            <a href="#" class="hover:underline">Ibadah</a>
            <a href="#" class="hover:underline">Berita</a>
            <a href="#" class="hover:underline">Jemaat</a>
            <div class="flex space-x-2 mt-4">
                <button class="bg-[#FFBB00] hover:bg-yellow-500 px-4 py-2 rounded text-sm">Donasi</button>
                <button class="bg-[#FB6542] hover:bg-orange-600 px-4 py-2 rounded text-sm">Login</button>
            </div>
        </nav>
    </div>
</header>
