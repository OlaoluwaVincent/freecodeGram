/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            hor: {
                display: "flex",
                flexDirection: "row",
            },
            ver: {
                display: "flex",
                flexDirection: "column",
            },
        },
    },
    plugins: [],
};
