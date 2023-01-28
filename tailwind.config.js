/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php", "./resources/views/*.blade.php"
  ],
  theme: {
    extend: {
      colors: {
        laravel: "#ef3b2d",
      },
    },
  },
  plugins: [],
}

