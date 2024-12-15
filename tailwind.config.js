const options = require("./config");

const allPlugins = {
  typography: require("@tailwindcss/typography"),
  forms: require("@tailwindcss/forms"),
  containerQueries: require("@tailwindcss/container-queries"),
};

const plugins = Object.keys(allPlugins)
  .filter((k) => options.plugins[k])
  .map((k) => {
    if (k in options.plugins && options.plugins[k]) {
      return allPlugins[k];
    }
  });

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  darkMode: "dark",
  theme: {
    screens: {
      sm: "678px",
      lg: "1024px",
      xl: "1280px",
    },
    
    fontSize: {
      "89bold": [
        "5.5625rem",
        {
          fontWeight: 700,
          lineHeight: "1em",
          letterSpacing: "-0.02em",
        },
      ],
      "64semi": [
        "4rem",
        {
          fontWeight: 600,
          lineHeight: "1em",
          letterSpacing: "-0.03em",
        },
      ],
      "56semi": [
        "3.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.04em",
        },
      ],
      "56med": [
        "3.5rem",
        {
          fontWeight: 500,
          lineHeight: "1.1em",
          letterSpacing: "-0.03em",
        },
      ],
      "48semi": [
        "3rem",
        {
          fontWeight: 600,
          lineHeight: "1.1em",
          letterSpacing: "normal",
        },
      ],
      "48med": [
        "3rem",
        {
          fontWeight: 500,
          lineHeight: "1.1em",
          letterSpacing: "normal",
        },
      ],
      "40semi2": [
        "2.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.1em",
          letterSpacing: "-0.03em",
        },
      ],
      "40semi": [
        "2.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.04em",
        },
      ],
      "40med": [
        "2.5rem",
        {
          fontWeight: 500,
          lineHeight: "1.2em",
          letterSpacing: "-0.02em",
        },
      ],
      "32semi": [
        "2rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.01em",
        },
      ],
      "32med": [
        "2rem",
        {
          fontWeight: 500,
          lineHeight: "1.1em",
          letterSpacing: "-0.04em",
        },
      ],
      "27semi": [
        "1.6875rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.01em",
        },
      ],
      "24semi2": [
        "1.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.35em",
          letterSpacing: "-0.01em",
        },
      ],
      "24semi": [
        "1.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.01em",
        },
      ],
      "24med": [
        "1.5rem",
        {
          fontWeight: 500,
          lineHeight: "1.4em",
          letterSpacing: "-0.02em",
        },
      ],
      "24reg": [
        "1.5rem",
        {
          fontWeight: 400,
          lineHeight: "1.25em",
          letterSpacing: "-0.02em",
        },
      ],
      "22med": [
        "1.375rem",
        {
          fontWeight: 500,
          lineHeight: "1.2em",
          letterSpacing: "normal",
        },
      ],
      "20semiB": [
        "1.25rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.02em",
        },
      ],
      "20med": [
        "1.25rem",
        {
          fontWeight: 500,
          lineHeight: "1.35em",
          letterSpacing: "0.01em",
        },
      ],
      "20reg": [
        "1.25rem",
        {
          fontWeight: 400,
          lineHeight: "1.1em",
          letterSpacing: "-0.04em",
        },
      ],
      "17med2": [
        "1.0625rem",
        {
          fontWeight: 500,
          lineHeight: "1.45em",
          letterSpacing: "-0.01em",
        },
      ],
      "17med": [
        "1.0625rem",
        {
          fontWeight: 500,
          lineHeight: "1.35em",
          letterSpacing: "-0.02em",
        },
      ],
      "17reg": [
        "1.0625rem",
        {
          fontWeight: 400,
          lineHeight: "1.35em",
          letterSpacing: "0.01em",
        },
      ],
      "16med": [
        "1rem",
        {
          fontWeight: 500,
          lineHeight: "1.35em",
          letterSpacing: "0.01em",
        },
      ],
      "16reg": [
        "1rem",
        {
          fontWeight: 400,
          lineHeight: "1.35em",
          letterSpacing: "0.01em",
        },
      ],
      "15semi": [
        "0.9375rem",
        {
          fontWeight: 600,
          lineHeight: "normal",
          letterSpacing: "normal",
        },
      ],
      "15med": [
        "0.9375rem",
        {
          fontWeight: 500,
          lineHeight: "1.35em",
          letterSpacing: "normal",
        },
      ],
      "14semi": [
        "0.875rem",
        {
          fontWeight: 600,
          lineHeight: "1.35em",
          letterSpacing: "-0.03em",
        },
      ],
      "14med": [
        "0.875rem",
        {
          fontWeight: 500,
          lineHeight: "normal",
          letterSpacing: "normal",
        },
      ],
      "14reg": [
        "0.875rem",
        {
          fontWeight: 400,
          lineHeight: "1.35em",
          letterSpacing: "0.01em",
        },
      ],
      "13reg": [
        "0.8125rem",
        {
          fontWeight: 400,
          lineHeight: "1.5em",
          letterSpacing: "normal",
        },
      ],
      "13med": [
        "0.8125rem",
        {
          fontWeight: 500,
          lineHeight: "normal",
          letterSpacing: "normal",
        },
      ],
      "12semi": [
        "0.75rem",
        {
          fontWeight: 600,
          lineHeight: "1.35em",
          letterSpacing: "-0.03em",
        },
      ],
      "12med": [
        "0.75rem",
        {
          fontWeight: 500,
          lineHeight: "1.45em",
          letterSpacing: "normal",
        },
      ],
      "10med": [
        "0.675rem",
        {
          fontWeight: 500,
          lineHeight: "auto",
          letterSpacing: "normal",
        },
      ],
    },
    colors: {
        trans: 'transparent',
        white: "#fff",
	      blackBlue: "#080a0b",
	      black: "#000",
	      black900: "#393939",
	      black800: "#4b4b4b",
	      black700: "#5e5e5e",
	      black600: "#727272",
	      black500: "#868686",
	      black400: "#9b9b9b",
	      black300: "#b0b0b0",
	      black200: "#c6c6c6",
	      black100: "#ddd",
	      black50: "#f3f3f3",
	      accnet: "#2f68fa",
	      error: "rgba(227, 6, 6, 1)"

    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1.25rem",
        sm: "3.5rem",
      },
    },
    extend: {
      height: {
        screen: "var(--doc-height, 100vh)",
      },
    },
  },
  plugins: plugins,
};
