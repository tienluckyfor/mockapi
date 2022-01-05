module.exports = {
    content: [
        // "./resources/**/*.blade.php",
        // "./resources/**/*.js",
        // "./resources/**/*.vue",
        "./resources/phumy/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
    ],
}
