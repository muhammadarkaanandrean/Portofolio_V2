/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './index.html',
        './src/**/*.{js,ts,jsx,tsx,html}',
    ],
    darkMode: 'class', // dark mode berbasis class "dark" pada <html>
    theme: {
        extend: {
            colors: {
                primary: '#2563EB',   // warna utama
                secondary: '#1E40AF', // warna hover / aksen tua
                accent: '#38BDF8',    // warna aksen untuk mode gelap
            },
            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-14px)' },
                },
                'reveal-up': {
                    from: { opacity: '0', transform: 'translateY(32px)' },
                    to: { opacity: '1', transform: 'none' },
                },
            },
            animation: {
                float: 'float 6s ease-in-out infinite',
                'fade-up': 'reveal-up .9s ease-out both',
            },
        },
    },
    plugins: [],
};
