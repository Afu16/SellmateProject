import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#3C096C', // custom primary color
                    50: '#f3e9fb',
                    100: '#e6d3f7',
                    200: '#c0a9f0',
                    300: '#9a7fec',
                    400: '#744de3',
                    500: '#3C096C',
                    600: '#320860',
                    700: '#280654',
                    800: '#1e043f',
                    900: '#14022a',
                },
                secondary: {
                    DEFAULT: '#DD661D',
                },
                tertiary: {
                    DEFAULT: '#FFC107',
                },
                quaternary: {
                    DEFAULT: '#D9D9D9',
                },
            },
            boxShadow: {
                'secondary': '2px 2px 0px 1px #DD661D',
            },
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
                pilcrow: ['Pilcrow', 'sans-serif'],
                quicksand: ['Quicksand', 'sans-serif'],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontWeight: {
                'inter-thin': '100',
                'inter-extralight': '200',
                'inter-light': '300',
                'inter-regular': '400',
                'inter-medium': '500',
                'inter-semibold': '600',
                'inter-bold': '700',
                'inter-extrabold': '800',
                'inter-black': '900',
                'pilcrow-light': '300',
                'pilcrow-regular': '400',
                'pilcrow-medium': '500',
                'pilcrow-semibold': '600',
                'pilcrow-bold': '700',
                'pilcrow-heavy': '900',
                'quicksand-light': '300',
                'quicksand-regular': '400',
                'quicksand-medium': '500',
                'quicksand-semibold': '600',
                'quicksand-bold': '700',
            },
        },
    }, 

    plugins: [ forms, typography],
};
