const plugin = require('tailwindcss/plugin')

module.exports = {
  corePlugins: {
    container: false
  },


  content: [
    './resources/js/**/*.{vue, js, ts, jsx, tsx}',
    './resources/views/**/*.php'
  ],
  safelist: ["bg-lightGreen", "bg-lightGrey"],
  theme: {
    screens: {

      sm: '640px',
      md: '810px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1440px'
    },

    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: '#fff',
      black: '#000',
      lightBlue: '#7678ED',
      darkBlue: '#000064',
      lightGreen: '#00FFC4',
      lightGrey: ' #EEEEEE;'
    },

    fontSize: {
      10: '0.625rem',
      12: '0.75rem',
      16: '1rem',
      48: '3rem',
      32: '2rem',
      20: '1.25rem',
      24: '1.5em',
      14: '0.875rem'
    },

    fontFamily:{
      poppins: ['poppins']
    },






    extend: {
      transitionProperty:{
              'scale': 'scale(0)',
            },
    }
  },
  plugins: [
    // ..
  ]
}
