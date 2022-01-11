module.exports = {
    content: [
        // "./resources/**/*.blade.php",
        // "./resources/**/*.js",
        // "./resources/**/*.vue",
        "./resources/views/sites/phumy/**/*.blade.php",
        // "./resources/views/sites/webnhanh/**/*.blade.php",
    ],
    theme: {
        extend: {
            display: ["group-hover"],
            backgroundOpacity: ['active'],
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
    ],
}
