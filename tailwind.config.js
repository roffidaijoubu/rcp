import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],

    daisyui: {
        themes: ["light", "dark", "corporate", "nord", "night", "cupcake"],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: [
                    "IBM Plex Sans Condensed",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },

    plugins: [forms, typography, require("daisyui")],
};
