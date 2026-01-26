/**
 * Container Plugin - modifies Tailwind’s default container.
 */
const containerStyles = ({ addComponents }) => {
    const containerBase = {
      maxWidth: '100%',
      marginLeft: 'auto',
      marginRight: 'auto',
      paddingLeft: '30px',
      paddingRight: '30px',
      '@screen lg': {
        paddingLeft: '40px',
        paddingRight: '40px'
      },
      '@screen 2xl': {
        paddingLeft: '75px',
        paddingRight: '75px'
      }
    };
  
    addComponents({
      '.container': {
        ...containerBase,
        '@screen xl': {
          width: '100%',
          maxWidth: '1400px',
          paddingLeft: '3.75rem',
          paddingRight: '3.75rem',
        }
      },
      '.container-fluid': {
        ...containerBase,
        '@screen lg': {
          paddingLeft: '45px',
          paddingRight: '45px'
        }
      },
    });
  }
  
  /** @type {import('tailwindcss').Config} */
  module.exports = {
    corePlugins: {
      preflight: false
    },
    content: [
      './footer.php',
      './header.php',
      './index.php',
      './single.php',
      './src/scss/**/*.scss',
      './src/js/**/*.js',
      './templates/page-*.php',
      './template-parts/*.php',
      './template-parts/sections/*.php',
      './archive.php',
      './woocommerce/*.php',
      './woocommerce/**/*.php',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      container: {
        center: true,
      },
      // fontSize: {
      //   '5xl': '2.75rem'
      // },
      fontFamily: {
        serif: ['"Span"', 'serif'],
        sans: ['"Open Sans"', 'sans-serif'],
      },
      extend: {
        inset: {
          'unset': 'unset'
        },
        zIndex: {
          header: 999
        },
      },
    },
    plugins: [
      require('flowbite/plugin'),
      containerStyles,
    ],
    // important: true,
  }