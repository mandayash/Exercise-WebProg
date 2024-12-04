/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },

      colors: {
        'hijau' : '#43834E',
        'hijau 2' : '#E3EBE5',
        'abu' : '#6A6B6A',
        'teks' : '#FDFFFD',
        'teks2' : '#121212',
        'hijau3' : '#72C781',
        'coklat' : '#A9661B'
      }
    },
  },
  plugins: [],
}