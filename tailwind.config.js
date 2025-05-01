/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/filament/**/*.blade.php',
      ],
  theme: {
    extend: {
        colors: {
            'primary': '#F5981D',
            'grey': '#ADADAD',
            'gray-bg': '#F5F5F5',
            'gray-home': '#F6F6F6',
            'gray-footer': '#F5D9B5',
            'gray-client': '#D9D9D9',
            'gray-product': "#999999",
            'purple': '#8F64AB',
            'purple-dark': '#643D7D',
            'purple-About': "#7B4F98",
            'transparent-orange': "rgba(245, 152, 29, 0) ",
            black: colors.black,
            white: colors.white,
            red: colors.red,
            gray: colors.gray,
            transparent: 'transparent',
            'midnight': '#121063',
            'metal': '#565584',
            'tahiti': '#3ab7bf',
            'silver': '#ecebff',
            'bubble-gum': '#ff77e9',
            'bermuda': '#78dcca',
            // 'red': '#FF0000',
            
        },
        animation: {
            shine: "shine 1s",
        },
        keyframes: {
            shine: {
                "100%": {left: "125%"},
            },
        },
    },
    fontFamily: {
        Outfit: 'Outfit',
    },
  },
  plugins: [
    require("@designbycode/tailwindcss-text-stroke"),
  ],
}

