import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import copy from 'copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: undefined,
            },
        },
    },
    // Add custom asset handling for FontAwesome webfonts
    assetsDir: 'assets', // The directory name where assets are placed
    assetsInlineLimit: 4096, // Adjust as needed

    // Add a rule to copy webfonts from FontAwesome to the assets directory
    rollupOptions: {
        output: {
            manualChunks: undefined,
            assetFileNames: 'webfonts/[name][ext]', // Adjust the output directory as needed
        },
    },
});
