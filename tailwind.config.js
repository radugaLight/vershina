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
      sm: "640px",
      lg: "1024px",
      xl: "1280px",
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1.25rem",
        sm: "2.5rem",
      },
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
      "56semi": [
        "3.5rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.04em",
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
      "40med": [
        "2.5rem",
        {
          fontWeight: 500,
          lineHeight: "1.2em",
          letterSpacing: "-0.02em",
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
      "27med": [
        "1.6875rem",
        {
          fontWeight: 500,
          lineHeight: "1.3em",
          letterSpacing: "-0.02em",
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
      "20semiB": [
        "1.25rem",
        {
          fontWeight: 600,
          lineHeight: "1.2em",
          letterSpacing: "-0.02em",
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
      "17med": [
        "1.0625rem",
        {
          fontWeight: 500,
          lineHeight: "1.35em",
          letterSpacing: "normal",
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
      "16reg": [
        "1rem",
        {
          fontWeight: 400,
          lineHeight: "1.3em",
          letterSpacing: "-0.02em",
        },
      ],
      "14semi": [
        "0.875rem",
        {
          fontWeight: 600,
          lineHeight: "1.3em",
          letterSpacing: "normal",
        },
      ],
      "14med": [
        "0.875rem",
        {
          fontWeight: 500,
          lineHeight: "1.3em",
          letterSpacing: "normal",
        },
      ],
      "14reg": [
        "0.875rem",
        {
          fontWeight: 400,
          lineHeight: "1.5em",
          letterSpacing: "normal",
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
      "12med": [
        "0.75rem",
        {
          fontWeight: 500,
          lineHeight: "1.45em",
          letterSpacing: "normal",
        },
      ],
    },
    colors: {
      white: "#fff",
      shadow1: "#bf8dff",
      shadow2: "#ffc4ab",
      gray60: "#575757",
      gray50: "#434343",
      gray30: "#848484",
      gray20: "#adadad",
      gray10: "#e6e5e1",
      gray0: "#e2e2e2",
      black100: "#090909",
      black90: "#111",
      black80: "#1b1b1b",
      black70: "#292929",
    },
    extend: {
      height: {
        screen: "var(--doc-height, 100vh)",
      },
    },
  },
  plugins: plugins,
};
