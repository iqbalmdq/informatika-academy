import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/livewire.css',
                'resources/js/app.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
                'app/Filament/**/*.php',
                'resources/views/livewire/**/*.blade.php',
            ],
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['alpinejs'],
                    filament: ['@filament/support']
                }
            }
        },
        chunkSizeWarningLimit: 1000
    }
});
