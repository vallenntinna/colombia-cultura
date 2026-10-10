/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./views/**/*.php",
    "./app/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        col: {
          yellow: "#FCD116",
          blue: "#003893",
          red: "#CE1126"
        },
        brand: {
          50: "#eff6ff",
          100: "#dbeafe",
          200: "#bfdbfe",
          300: "#93c5fd",
          400: "#60a5fa",
          500: "#3b82f6",
          600: "#2563eb",
          700: "#1d4ed8",
          800: "#1e40af",
          900: "#1e3a8a",
          950: "#0b1f4b"
        },
        sun: {
          50: "#fffbeb",
          100: "#fef3c7",
          200: "#fde68a",
          300: "#fcd34d",
          400: "#fbbf24",
          500: "#f59e0b",
          600: "#d97706"
        }
      },
      fontFamily: {
        sans: ["Inter", "system-ui", "-apple-system", "Segoe UI", "Roboto", "sans-serif"],
        display: ["Outfit", "Inter", "system-ui", "sans-serif"]
      },
      boxShadow: {
        soft: "0 10px 40px -12px rgba(15, 23, 42, 0.18)",
        glow: "0 0 0 1px rgba(255,255,255,0.06), 0 20px 60px -20px rgba(0, 86, 179, 0.55)"
      },
      keyframes: {
        "fade-up": {
          "0%": { opacity: "0", transform: "translateY(24px)" },
          "100%": { opacity: "1", transform: "translateY(0)" }
        },
        "fade-in": {
          "0%": { opacity: "0" },
          "100%": { opacity: "1" }
        },
        float: {
          "0%, 100%": { transform: "translateY(0)" },
          "50%": { transform: "translateY(-14px)" }
        },
        "gradient-x": {
          "0%, 100%": { backgroundPosition: "0% 50%" },
          "50%": { backgroundPosition: "100% 50%" }
        },
        marquee: {
          "0%": { transform: "translateX(0)" },
          "100%": { transform: "translateX(-50%)" }
        }
      },
      animation: {
        "fade-up": "fade-up 0.7s cubic-bezier(0.22,1,0.36,1) both",
        "fade-in": "fade-in 0.8s ease-out both",
        float: "float 6s ease-in-out infinite",
        "gradient-x": "gradient-x 12s ease infinite",
        marquee: "marquee 30s linear infinite"
      }
    }
  },
  plugins: []
};
