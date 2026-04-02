# Use a specific, stable version instead of 'latest'
FROM richarvey/php-nginx:php8.3

# Set the working directory
WORKDIR /var/www/html

# Copy your project files
COPY . .

# Install PHP dependencies (Composer)
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
RUN npm install && npm run build

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the port Render expects
EXPOSE 80
