import { defineConfig } from "vite"
import laravel from "laravel-vite-plugin"
import tailwindcss from "@tailwindcss/vite"

export default defineConfig({
    server: {
        watch: {
            usePolling: true, // for Docker, WSL, VM setups
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css"],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            "@": "./resources",
        },
    },
})
