<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal Ibadah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Tambah Ibadah -->
                    <form action="{{ route('ibadah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Kategori Ibadah -->
                        <div class="mb-4">
                            <label for="category" class="block text-md font-medium text-gray-700">Kategori
                                Ibadah</label>
                            <select id="category" name="category"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
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

                        <!-- Pengkhotbah Ibadah -->
                        <div class="mb-4">
                            <label for="preacher" class="block text-md font-medium text-gray-700">Pengkhotbah</label>
                            <input type="text" name="preacher" id="preacher"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan pengkhotbah" value="{{ old('preacher') }}">

                            @error('preacher')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Singer Ibadah -->
                        <div class="mb-4">
                            <label for="singer" class="block text-md font-medium text-gray-700">Singer</label>
                            <input type="text" name="singer" id="singer" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan singer ibadah" value="{{ old('singer') }}">

                            @error('singer')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Ibadah -->
                        <div class="mb-4">
                            <label for="date" class="block text-md font-medium text-gray-700">Tanggal Ibadah</label>
                            <input type="datetime-local" name="date" id="date" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan pengkhotbah" value="{{ old('date') }}">

                            @error('date')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tempat Ibadah -->
                        <div class="mb-4">
                            <label for="place" class="block text-md font-medium text-gray-700">Tempat Ibadah</label>
                            <textarea name="place" id="place" cols="30" rows="5"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                value="{{ old('place') }}"></textarea>

                            @error('place')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Aksi Berita -->
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('ibadah.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                </svg>
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4 mr-2">
                                    <path
                                        d="M11.47 1.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 0 1-1.06-1.06l3-3ZM11.25 7.5V15a.75.75 0 0 0 1.5 0V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
                                </svg>
                                Tambah Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
