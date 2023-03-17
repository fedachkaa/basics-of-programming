/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue'
  ],
  theme: {
    extend: {
        colors: {
            'deep-blue': '#0124A0',
            'light-yellow': '#E7E8AB',
            'deep-yellow': '#FCFF81'
        },
        fontFamily: {
            'serif': ['jost', 'kurale'],
        }
    },
  },
  plugins: [
      require('@tailwindcss/forms')
  ],
}
