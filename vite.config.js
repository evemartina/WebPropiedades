import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/css/admin.css',
                'public/css/boton-social.css',
                'public/css/style.css',
            ],
            refresh: true,
        }),
    ],
});
