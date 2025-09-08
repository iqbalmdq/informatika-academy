#!/bin/bash

# Deployment script untuk Laravel Cloud
echo "Starting deployment..."

# Install dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Clear all caches
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Cache configurations
echo "Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize Filament
echo "Optimizing Filament..."
php artisan filament:optimize

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Install and build frontend assets
echo "Building frontend assets..."
npm ci --production
npm run build

# Set proper permissions
echo "Setting permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Final optimization
echo "Final optimization..."
php artisan optimize

echo "Deployment completed successfully!"