<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Course Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <img src="{{ $course->thumbnail_url }}" alt="{{ $course->title }}" class="w-full h-64 object-cover">

            <div class="p-8">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $course->title }}</h1>
                        <p class="text-gray-600 mb-4">{{ $course->description }}</p>

                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span>Instruktur: {{ $course->instructor->name }}</span>
                            <span>Level: {{ $course->level }}</span>
                            <span>Durasi: {{ $course->duration_hours }} jam</span>
                        </div>
                    </div>

                    <div class="text-right">
                        <div class="text-2xl font-bold text-green-600 mb-4">
                            @if ($course->price > 0)
                                Rp {{ number_format($course->price, 0, ',', '.') }}
                            @else
                                Gratis
                            @endif
                        </div>

                        @auth
                            @if ($isEnrolled)
                                <button class="bg-green-600 text-white px-6 py-3 rounded-lg cursor-not-allowed" disabled>
                                    ✓ Sudah Terdaftar
                                </button>
                                @if ($enrollment && $enrollment->progress > 0)
                                    <div class="mt-2 text-sm text-gray-600">
                                        Progress: {{ $enrollment->progress }}%
                                    </div>
                                @endif
                            @else
                                <button wire:click="enroll"
                                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Daftar Sekarang
                                </button>
                            @endif
                        @else
                            <button type="button" wire:navigate href="{{ route('login') }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                Login untuk Mendaftar
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Modules -->
        @if ($course->modules->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Modul Pembelajaran</h2>

                <div class="space-y-4">
                    @foreach ($course->modules as $index => $module)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $index + 1 }}. {{ $module->title }}
                                    </h3>
                                    <p class="text-gray-600 mt-1">{{ $module->content }}</p>
                                    <div class="flex items-center space-x-4 mt-2 text-sm text-gray-500">
                                        <span>Video: {{ $module->video_url ? 'Ada' : 'Tidak ada' }}</span>
                                        <span>Order: {{ $module->order }}</span>
                                    </div>
                                </div>

                                @if ($isEnrolled)
                                    <button
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                        Mulai
                                    </button>
                                @else
                                    <span class="text-gray-400">🔒</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
