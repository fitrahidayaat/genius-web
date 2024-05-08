/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        lato : ['Lato', 'sans-serif']
      },
      colors: {
        'primary': '#0CAFF5',
        'primary-darker': '#0A9CE5'
      }
    },
  },
  plugins: [
    
  ],
}

