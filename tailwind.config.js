/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    container: {
      padding: {
        DEFAULT: '15px',
      },
    },
    screens: {
      sm : '640px',
      md : '768px',
      lg : '960px',
      xl : '1200px',
    },

    fontFamily : {
      primary : 'Poppins',
      secondary : 'Volkhov',
    },

    backgroundImage: {
      bg: 'url(../public/aset/bg1.png)',
      bg2: 'url(../public/aset/bg2.png)',
    },

    extend: {
      fontFamily : {
        "Volkhov" : ['Volkhov']
      },

      colors : {
        "primary1" : '#896558',
        "primary2" : '#898E92',
        "primary3" : '#F2F0E8'
      },

      
    },
  },
  plugins: [],
}

