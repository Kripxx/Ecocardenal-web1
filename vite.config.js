import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
    https: true,
    hmr: {
      host: '3fc51f1e02da.ngrok-free.app'
    }
  },
});
