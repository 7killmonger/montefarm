/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./src/**/*.js",
    "./src/**/*.jsx",
    "./template-parts/**/*.php",
  ],
  theme: {
    extend: {
      width: {
        "1/7": "14.2857143%",
        "2/7": "28.5714286%",
        "3/7": "42.8571429%",
        "4/7": "57.1428571%",
        "5/7": "71.4285714%",
        "6/7": "85.7142857%",
      },
      backgroundImage: theme => ({
        'footer-gradient': 'linear-gradient(180deg, rgba(255,255,255,0) 11%, rgba(241,248,255,1) 11%)'
      }),
    },
  },
  plugins: [
  ],
}

