import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import "../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables-all.js";
import "../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
