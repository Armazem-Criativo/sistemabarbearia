import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/welcome.css',
                'resources/css/login/login.css',
                'resources/css/components/sidebar.css',
                'resources/css/home/home.css',
                'resources/css/user/user-index.css',
                'resources/css/user/user-create.css',
                'resources/css/user/user-edit.css',
                'resources/css/employees/employee-index.css',
                'resources/css/employees/employee-create.css',
                'resources/css/employees/employee-edit.css',
                'resources/css/clients/client-create.css',
                'resources/css/clients/client-edit.css',
                'resources/css/clients/client-index.css',
                'resources/css/payment/payment-index.css',
                'resources/css/payment/payment-create.css',
                'resources/css/payment/payment-edit.css',
                'resources/css/services/service-index.css',
                'resources/css/services/service-create.css',
                'resources/css/services/service-edit.css',
                'resources/css/scheduling/scheduling-index.css',
                'resources/css/scheduling/scheduling-create.css',
                'resources/css/scheduling/scheduling-edit.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
