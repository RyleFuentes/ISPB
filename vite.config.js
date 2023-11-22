import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/bootstrap.css",
                "resources/css/style.css",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/bootstrap.min.js",
                "resources/js/jquery-3.6.0.min.js",
                "resources/js/script.js",
            ],
            refresh: true,
        }),
    ],
});
