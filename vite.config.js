import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        chunkSizeWarningLimit: 1000,
    },
    css: {
        preprocessorOptions: {
            scss: {
                silenceDeprecations: ['import', 'global-builtin', 'color-functions']
            }
        }
    }
});
