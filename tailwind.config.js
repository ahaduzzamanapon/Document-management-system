/** @type {import('tailwindcss').Config} */
module.exports = {
  
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    
  ],
  theme: {
    extend: {
      fontSize: {
                '10': '0.625em',
                '12': '0.75em',
                '13': '0.8125em',
                '14': '0.875em',
                '15': '0.9375em',
                '16': '1em',
                '18': '1.125em',
                '20': '1.25em',
                '22': '1.375em',
                '24': '1.5em',
                '26': '1.625em',
                '28': '1.75em',
                '30': '1.875em',
                '32': '2em',
                '36': '2.25em',
                '40': '2.5em',
                '48': '3em',
              },
              colors: {
                primary: '#12633D',
                secondary: '#69AB1D',
                lightyellow: '#F6C515;',
                orange: '#F94910',
                lightblue: '#00A6B0',
                pink: '#FF002E',
                lightgray: '#5A1313',
                green4: '#F2FAF4',
                deepgreen: '#368C72',
                green5: '#1E433D',
                magenta: '#8600B5',
              },
              fontFamily: {
                poppins : ['Poppins', 'sans-serif'],
                roboto : ['Roboto', 'sans-serif'],
                solaimans : ['SolaimanLipi', 'sans-serif'],
              }
              
    },
  },
  plugins: [
  ],
  daisyui: {
    themes: ["light", "dark", "cupcake"],
  },
}





