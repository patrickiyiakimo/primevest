import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
     theme: {
        extend: {
            fontFamily: {
                'sans': ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                'heading': ['Plus Jakarta Sans', 'sans-serif'],
                'body': ['Plus Jakarta Sans', 'sans-serif'],
            },
            /* The app/dashboard used Tailwind's stock blue (#2f7bff family),
               which did not match the landing page brand. Remap the whole
               `blue` scale onto the landing palette (#4b18bf) so every
               existing blue-* utility picks up the brand colour. */
            colors: {
                blue: {
                    50: '#f2eefe',
                    100: '#e4dcfd',
                    200: '#cbbcfb',
                    300: '#b8a9ff',
                    400: '#8b5cf6',
                    500: '#6a2ee0',
                    600: '#4b18bf',
                    700: '#3a1296',
                    800: '#2b0e70',
                    900: '#1c0947',
                },
            },
        },
    },

    plugins: [forms],
};
