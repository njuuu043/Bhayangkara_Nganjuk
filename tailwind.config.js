/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./app/**/*.{php,html,js}",'node_modules/preline/dist/*.js',],
  theme: {
    extend: {},
  },
  plugins: [  require('preline/plugin')],
}