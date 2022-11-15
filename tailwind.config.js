/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                montserrat: ["Montserrat"],
                lato: ["Lato"],
                garamond: ["Garamond"],
            },
        },
    },
    plugins: [require("daisyui")],
};
