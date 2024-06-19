import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    define: {
        // Define the feature flag here
        '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
    }
});



// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: 'resources/js/app.js',
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//         {
//             define: { // Use define to define the feature flag
//                 '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
//             }
//         }
//     ],
// });



// import { defineConfig, define } from 'vite'; // Import define function from vite

// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: 'resources/js/app.js',
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//         define({ // Use define to define the feature flag
//             '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(true)
//         })
//     ],
// });
