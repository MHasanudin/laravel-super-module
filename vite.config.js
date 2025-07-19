import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
                'resources/js/**',
                'modules/**/resources/**',
            ],
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        open: false,
    },
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources/js'),
            '@doctypes': resolve(__dirname, 'resources/js/features/doctypes'),
        },
    },
    build: {
        chunkSizeWarningLimit: 1600,
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['vue', 'vue-router'],
                    utils: ['lodash-es'],
                },
            },
        },
    },
});
