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
            colors: {
                "surface-tint": "#3f6653",
                "primary-fixed-dim": "#a5d0b9",
                "on-tertiary-container": "#cd9d6d",
                "on-tertiary": "#ffffff",
                "inverse-surface": "#2e3132",
                "secondary": "#77574d",
                "primary-container": "#1b4332",
                "primary-fixed": "#c1ecd4",
                "on-primary-container": "#86af99",
                "surface-bright": "#f8f9fa",
                "on-primary": "#ffffff",
                "error-container": "#ffdad6",
                "on-surface-variant": "#414844",
                "surface-container-lowest": "#ffffff",
                "surface": "#f8f9fa",
                "inverse-on-surface": "#f0f1f2",
                "on-secondary": "#ffffff",
                "on-background": "#191c1d",
                "outline": "#717973",
                "secondary-fixed-dim": "#e7bdb1",
                "surface-variant": "#e1e3e4",
                "surface-dim": "#d9dadb",
                "surface-container": "#edeeef",
                "tertiary-fixed-dim": "#f0bd8b",
                "surface-container-high": "#e7e8e9",
                "surface-container-highest": "#e1e3e4",
                "outline-variant": "#c1c8c2",
                "on-primary-fixed-variant": "#274e3d",
                "background": "#f8f9fa",
                "secondary-container": "#fed3c7",
                "on-tertiary-fixed-variant": "#623f18",
                "on-secondary-fixed": "#2c160e",
                "primary": "#012d1d",
                "on-surface": "#191c1d",
                "on-tertiary-fixed": "#2c1600",
                "tertiary-fixed": "#ffdcbd",
                "tertiary-container": "#56340e",
                "tertiary": "#3b1f00",
                "on-secondary-fixed-variant": "#5d4037",
                "on-secondary-container": "#795950",
                "on-primary-fixed": "#002114",
                "error": "#ba1a1a",
                "on-error-container": "#93000a",
                "on-error": "#ffffff",
                "surface-container-low": "#f3f4f5",
                "inverse-primary": "#a5d0b9",
                "secondary-fixed": "#ffdbd0"
            },
            borderRadius: {
                DEFAULT: "0.25rem",
                lg: "0.5rem",
                xl: "0.75rem",
                full: "9999px"
            },
            spacing: {
                "stack-md": "24px",
                "stack-lg": "48px",
                "stack-sm": "12px",
                "gutter": "24px",
                "container-max": "1440px",
                "margin-page": "40px",
                "base": "8px"
            },
            fontFamily: {
                sans: ['Manrope', ...defaultTheme.fontFamily.sans],
                body: ["Manrope", "sans-serif"],
            },
            fontSize: {
                "body-lg": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
                "label-caps": ["12px", { lineHeight: "16px", letterSpacing: "0.05em", fontWeight: "700" }],
                "body-sm": ["14px", { lineHeight: "20px", fontWeight: "400" }]
            }
        },
    },

    plugins: [forms],
};
