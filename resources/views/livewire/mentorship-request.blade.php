<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Permintaan Mentorship</h1>
        <p class="text-gray-600">Ajukan permintaan mentorship dengan dosen untuk meningkatkan kemampuan Anda</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6">
            <form wire:submit="submitRequest">
                <!-- Tipe Mentorship -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe Mentorship <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative">
                            <input type="radio" 
                                   wire:model="type" 
                                   value="coaching_clinic" 
                                   class="sr-only peer">
                            <div class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-500 peer-checked:bg-blue-500 relative">
                                        <div class="w-2 h-2 bg-white rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100"></div>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">Coaching Clinic</h3>
                                        <p class="text-sm text-gray-500">Sesi konsultasi singkat untuk masalah spesifik</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="relative">
                            <input type="radio" 
                                   wire:model="type" 
                                   value="mentorship_program" 
                                   class="sr-only peer">
                            <div class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-4 h-4 border-2 border-gray-300 rounded-full peer-checked:border-blue-500 peer-checked:bg-blue-500 relative">
                                        <div class="w-2 h-2 bg-white rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100"></div>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">Mentorship Program</h3>
                                        <p class="text-sm text-gray-500">Program mentorship jangka panjang</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Pilih Mentor -->
                <div class="mb-6">
                    <label for="mentor_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Mentor <span class="text-red-500">*</span>
                    </label>
                    <select wire:model="mentor_id" 
                            id="mentor_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih dosen mentor...</option>
                        @foreach($mentors as $mentor)
                            <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                        @endforeach
                    </select>
                    @error('mentor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Judul -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Mentorship <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           wire:model="title" 
                           id="title" 
                           placeholder="Contoh: Bimbingan Project Laravel E-commerce"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea wire:model="description" 
                              id="description" 
                              rows="4" 
                              placeholder="Jelaskan secara detail apa yang ingin Anda pelajari atau masalah yang ingin didiskusikan..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Jadwal yang Diinginkan -->
                <div class="mb-6">
                    <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-2">
                        Jadwal yang Diinginkan <span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" 
                           wire:model="scheduled_at" 
                           id="scheduled_at" 
                           min="{{ now()->format('Y-m-d\TH:i') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('scheduled_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- GitHub Repository (Opsional) -->
                <div class="mb-6">
                    <label for="github_repo" class="block text-sm font-medium text-gray-700 mb-2">
                        GitHub Repository (Opsional)
                    </label>
                    <input type="url" 
                           wire:model="github_repo" 
                           id="github_repo" 
                           placeholder="https://github.com/username/repository"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">Jika mentorship terkait dengan project tertentu, sertakan link repository</p>
                    @error('github_repo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Catatan Tambahan -->
                <div class="mb-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan Tambahan
                    </label>
                    <textarea wire:model="notes" 
                              id="notes" 
                              rows="3" 
                              placeholder="Informasi tambahan yang perlu diketahui mentor..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        <span class="text-red-500">*</span> Wajib diisi
                    </p>
                    <div class="flex gap-3">
                        <button type="button" 
                                class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                                wire:loading.attr="disabled"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-wait transition-colors">
                            <span wire:loading.remove>Kirim Permintaan</span>
                            <span wire:loading class="flex items-center gap-2">
                                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Mengirim...
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-green-800 font-medium">{{ session('message') }}</span>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span class="text-red-800 font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif
</div>
