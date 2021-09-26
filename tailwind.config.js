
const { colors: defaultColors } = require('tailwindcss/defaultTheme')

const colors = {
    ...defaultColors,
    ...{
        "custom": {
        "primary": "#03305A",
        "secondary": "#D56639",
        },
    },
}

module.exports = {
    "theme": {
        "colors": colors,
    },
  corePlugins: {
    container: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          maxWidth: '100%',
          '@screen sm': {
            maxWidth: '540px',
          },
          '@screen md': {
            maxWidth: '720px',
          },
          '@screen lg': {
            maxWidth: '992px',
          },
          '@screen xl': {
            maxWidth: '1200px',
          },
          
        }
      })
    }
  ]
}