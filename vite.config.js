import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/welcome.css',
                'resources/css/login/login.css',
                'resources/css/home/home.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
