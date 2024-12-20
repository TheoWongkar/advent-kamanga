<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Tambah Berita -->
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Judul Berita -->
                        <div class="mb-4">
                            <label for="title" class="block text-md font-medium text-gray-700">Judul Berita</label>
                            <input type="text" name="title" id="title" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                placeholder="Masukkan judul berita" value="{{ old('title') }}">

                            @error('title')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Berita -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-md font-medium text-gray-700">Kategori
                                Berita</label>
                            <select name="category_id" id="category_id" required
                                class="text-gray-500 mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]">
                                <option selected disabled>Kategori berita</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>

                            @error('status')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gambar Berita -->
                        <div x-data="{ imagePreview: null }" class="mb-4">
                            <label for="image" class="block text-md font-medium text-gray-700 mb-2">Gambar
                                Berita</label>
                            <input id="image" type="file" name="image"
                                class="block w-full text-gray-500 mt-1 border border-gray-300 rounded-md shadow-sm focus:border focus:border-[#141652] file:mr-4 file:py-2.5 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-[#141652] file:text-white hover:file:bg-blue-800 transition ease-in-out duration-200"
                                @change="if ($event.target.files.length) { 
                                const file = $event.target.files[0]; 
                                const reader = new FileReader(); 
                                reader.onload = (e) => { imagePreview = e.target.result; }; 
                                reader.readAsDataURL(file); 
                            } else { imagePreview = null; }">

                            <!-- Preview Image -->
                            <div class="mt-4" x-show="imagePreview" style="display: none;">
                                <div class="overflow-auto max-w-full h-64 rounded-md shadow-md border border-gray-300">
                                    <!-- Set a fixed height -->
                                    <img :src="imagePreview" class="w-full h-auto" alt="Image Preview">
                                </div>
                            </div>
                            @error('image')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Isi Berita -->
                        <div class="mb-4">
                            <label for="body" class="block text-md font-medium text-gray-700 mb-1">Isi
                                Berita</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                                input="body"></trix-editor>

                            @error('body')
                                <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Aksi Berita -->
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('berita.index') }}"
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
                                Tambah Berita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
