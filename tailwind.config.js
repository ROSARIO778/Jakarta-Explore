/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {},
    screens: {
      sm: "480px", // Untuk perangkat kecil seperti ponsel
      md: "768px", // Untuk tablet
      lg: "1024px", // Untuk laptop kecil
      xl: "1280px", // Untuk layar besar
      "2xl": "1536px", // Untuk layar ekstra besar
    },
  },
  daisyui: {
    themes: ["light", "cupcake"],
  },
  plugins: [require("daisyui")],
};
