<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Formulir Pengajuan Ibadah</h2>
            <form action="#" method="POST">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama" required>
                </div>
                <!-- Alamat -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <textarea id="address" name="address" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
                <!-- Kategori Pelayanan -->
                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori Pelayanan</label>
                    <select id="kategori" name="kategori"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                        <option value="" disabled selected>Pilih kategori pelayanan</option>
                        <option value="khusus">Pelayanan Khusus</option>
                        <option value="umum">Pelayanan Umum</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <!-- Tombol Submit -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">
                        Ajukan Ibadah
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
