<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jemaat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Tambah Berita -->
                    <form action="{{ route('jemaat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Nama Jemaat -->
                        <div class="mb-4">
                            <label for="name" class="block text-md font-medium text-gray-700">Nama Jemaat</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan nama jemaat" value="{{ old('name') }}">

                            @error('name')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-4">
                            <label for="gender" class="block text-md font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="gender" id="gender" required
                                class="text-gray-500 mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]">
                                <option selected disabled>Jenis kelamin</option>
                                <option value="Laki-Laki" {{ old('category') }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" {{ old('category') }}>
                                    Perempuan
                                </option>
                            </select>

                            @error('gender')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Usia Jemaat -->
                        <div class="mb-4">
                            <label for="age" class="block text-md font-medium text-gray-700">Usia Jemaat</label>
                            <input type="number" name="age" id="age" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan usia" value="{{ old('age') }}">

                            @error('age')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat Jemaat -->
                        <div class="mb-4">
                            <label for="address" class="block text-md font-medium text-gray-700">Alamat Jemaat</label>
                            <textarea name="address" id="address" cols="30" rows="5"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                value="{{ old('address') }}"></textarea>

                            @error('address')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Aksi Berita -->
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('jemaat.index') }}"
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
                                Tambah Jemaat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
