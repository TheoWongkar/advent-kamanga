<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 my-7 rounded-lg shadow-lg max-w-md w-full">
            <!-- Flash Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Formulir Pengajuan Ibadah</h2>
            <form action="{{ url('/ajukan-ibadah') }}" method="POST">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Pemohon</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama pemohon" required>
                    @error('place')
                        <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Alamat -->
                <div class="mb-4">
                    <label for="place" class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <textarea id="place" name="place" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan alamat lengkap" required></textarea>
                    @error('place')
                        <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Kategori Ibadah -->
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 font-medium mb-2">Kategori Pelayanan</label>
                    <select id="category" name="category"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                        <option value="{{ old('category') }}">
                            {{ old('category') ?: 'Pilih Kategori Ibadah' }}
                        </option>
                        <option value="Hari Minggu">Ibadah Hari Minggu</option>
                        <option value="Ulang Tahun Kelahiran">Ulang Tahun Kelahiran</option>
                        <option value="Ulang Tahun Pernikahan">Ulang Tahun Pernikahan</option>
                        <option value="Kedukaan">Kedukaan</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-medium mb-2">Waktu Pelaksanaan</label>
                    <input id="date" name="date" type="datetime-local"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required></input>
                    @error('date')
                        <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                    @enderror
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
