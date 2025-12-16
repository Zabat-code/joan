import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/js/app.js',
                'node_modules/datatables.net-dt/css/jquery.dataTables.min.css'],
            refresh: true,
        }),
    ],
});
