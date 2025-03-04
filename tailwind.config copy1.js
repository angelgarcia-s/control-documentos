/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.scss",
        "./resources/**/*.css",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./node_modules/preline/dist/*.js", // Mantener Preline
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'), // Mantener plugins de Ynex
        require('tailwind-clip-path'),
        require('preline/plugin'),
    ],
};