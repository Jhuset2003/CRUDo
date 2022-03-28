tailwind.config = {
    mode: 'jit',
    purge: [
        './public/**/*.html',
        './src/**/*.{js,jsx,ts,tsx,vue}',
      ],   
    theme: {
        extend: {
            colors: {
                clifford: '#da373d',
            }
        }
    }
}