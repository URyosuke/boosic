/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
         'libraly': "url('https://images.unsplash.com/photo-1535905557558-afc4877a26fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80')",
      },
      backgroundSize: {
       'auto': 'auto',
       'cover': 'cover',
       'contain': 'contain',
       '50%': '50%',
       '16': '4rem',
     }
    },
  },
  plugins: [],
}

