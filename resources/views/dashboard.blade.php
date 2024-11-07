<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Dashboard Statistics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <!-- Total Posts Card -->
                        <div class="bg-blue-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex items-center">
                                <div class="p-4 bg-blue-300 rounded-full text-blue-600">
                                    <i class="fas fa-file-alt text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">Total Berita</h3>
                                    <p class="mt-2 text-3xl font-bold text-blue-700">{{ $totalPosts }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Total Worship Card -->
                        <div
                            class="bg-green-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex items-center">
                                <div class="p-4 bg-green-300 rounded-full text-green-600">
                                    <i class="fas fa-church text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">Total Ibadah</h3>
                                    <p class="mt-2 text-3xl font-bold text-green-700">{{ $totalWorship }}</p>

                                    <!-- Latest Worship Schedule -->
                                    @if ($latestWorship)
                                        <div class="mt-4 text-sm text-gray-700">
                                            <span class="font-bold">Jadwal Ibadah Terbaru :</span>
                                            <p class="font-semibold">{{ $latestWorship->title }}</p>
                                            <p>{{ \Carbon\Carbon::parse($latestWorship->date)->format('d M Y') }}</p>
                                        </div>
                                    @else
                                        <div class="mt-4 text-sm text-gray-700">
                                            <span class="font-semibold">{{ __('Latest Worship Schedule:') }}</span>
                                            <p>{{ __('No upcoming schedules') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Total Congregation Card -->
                        <div
                            class="bg-purple-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex items-center">
                                <div class="p-4 bg-purple-300 rounded-full text-purple-600">
                                    <i class="fas fa-users text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold">Total Jemaat
                                    </h3>
                                    <p class="mt-2 text-3xl font-bold text-purple-700">{{ $totalCongregation }}</p>
                                    <div class="flex justify-between gap-3 mt-4 text-sm text-gray-600">
                                        <div>
                                            <span>Laki-Laki</span>
                                            <p class="text-xl font-bold">{{ $maleCongregation }}</p>
                                        </div>
                                        <div>
                                            <span>Perempuan</span>
                                            <p class="text-xl font-bold">{{ $femaleCongregation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
