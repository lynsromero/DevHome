# Use PHP 8.4 with FPM and Nginx
FROM richarvey/php-nginx:latest

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
