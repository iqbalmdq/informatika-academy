<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Daftar Kursus</h1>

        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" wire:model.live="search" placeholder="Cari kursus..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
    </div>

    <!-- Course Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($courses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="{{ $course->thumbnail_url }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $course->description }}</p>

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500">{{ $course->instructor->name }}</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                            {{ $course->level }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-900">Rp
                            {{ number_format($course->price, 0, ',', '.') }}</span>
                        <button type="button" wire:navigate href="{{ route('course.detail', $course->slug) }}" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Tidak ada kursus yang ditemukan.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $courses->links() }}
    </div>
</div>
