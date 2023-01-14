/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                green1: "#24F577",
                green2: "#A1F530",
                green3: "#1FCC64",
                whitep: "#DAEEFA",
                red1: "#F50054",
                red2: "#FF0078",
                skin: "#F5C6B4",
                skin2: "#F5B767",
                yellow1: "#FCBA4C",
                yellow2: "#FCD24C",
                blue1: "#337AFF",
            },
            fontFamily: {
                montserrat: ["Montserrat"],
                lato: ["Lato"],
                garamond: ["Garamond"],
            },
        },
    },
    plugins: [require("daisyui")],
};
