#!/bin/bash

# Install Node.js dependencies (if not already installed)
if [ ! -d "node_modules" ]; then
  echo "Installing frontend dependencies..."
  npm install
fi

# Run Laravel queue/workers/migrations if needed (optional)
# php artisan migrate --force

# Start Vite in background
npm run dev &

# Start PHP-FPM (foreground)
php-fpm
