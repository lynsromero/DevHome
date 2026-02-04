# DevHome - Developer Portfolio Platform

<div align="center">

![DevHome Logo](https://img.shields.io/badge/DevHome-Portfolio%20Platform-blue?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-06B6D4?style=for-the-badge&logo=tailwind-css)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**A modern, feature-rich portfolio platform built with Laravel 12 for developers to showcase their projects and manage their online presence.**

[🚀 Live Demo](https://github.com/lynsromero/DevHome) • [📖 Documentation](#documentation) • [🤝 Contributing](#contributing)

</div>

## 📋 Table of Contents

- [🌟 Features](#-features)
- [🛠️ Technology Stack](#️-technology-stack)
- [📁 Project Structure](#-project-structure)
- [🗄️ Database Schema](#️-database-schema)
- [🚀 Installation](#-installation)
- [⚙️ Configuration](#️-configuration)
- [🔧 Development](#-development)
- [📝 API Documentation](#-api-documentation)
- [🚀 Deployment](#-deployment)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

---

## 🌟 Features

### 👥 Public-Facing Features
- **🎨 Modern Portfolio Display** - Responsive showcase of developer projects
- **🔍 Advanced Project Filtering** - Filter projects by technology stack (Laravel, PHP, MERN, Themes)
- **📱 Mobile-First Design** - Fully responsive with dark mode support
- **⚡ AJAX-Powered Navigation** - Dynamic loading with smooth transitions
- **📊 Project Analytics** - Track project views with IP-based deduplication
- **📧 Contact Form** - Professional contact system with validation
- **👥 Team Display** - Showcase team members and their profiles
- **🔗 SEO-Friendly URLs** - Clean URLs with slugs and meta tags

### 🛡️ Admin Panel Features
- **🔐 Secure Authentication** - Protected admin dashboard
- **📊 Analytics Dashboard** - Real-time statistics and metrics
- **📁 Project Management** - Full CRUD operations for projects
- **👤 Profile Management** - Update personal information and social links
- **📸 Image Uploads** - Handle project thumbnails and profile images
- **📧 Email Tracking** - Monitor and manage contact submissions
- **⚙️ Settings Management** - Dynamic website configuration

---

## 🛠️ Technology Stack

### Backend Technologies
| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.0 | PHP Framework |
| **PHP** | 8.2+ | Backend Language |
| **MySQL** | 5.7+ | Database |
| **Propaganistas Laravel Phone** | 6.0 | Phone Validation |

### Frontend Technologies
| Technology | Version | Purpose |
|------------|---------|---------|
| **TailwindCSS** | 4.0 | CSS Framework |
| **Alpine.js** | Latest | JavaScript Interactivity |
| **jQuery** | 3.6.0 | DOM Manipulation |
| **Vite** | 7.0 | Build Tool |
| **Axios** | 1.11.0 | HTTP Client |

### Development Tools
| Tool | Purpose |
|------|---------|
| **Laravel Tinker** | Console Debugging |
| **PHPUnit** | Testing Framework |
| **Laravel Pint** | Code Formatting |
| **Concurrently** | Multi-Process Development |

---

## 📁 Project Structure

```
DevHome/
├── 📂 app/
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   │   ├── 📂 Admin/
│   │   │   │   ├── 📄 AdminController.php
│   │   │   │   ├── 📄 ProfileController.php
│   │   │   │   └── 📄 ProjectController.php
│   │   │   ├── 📄 HomeController.php
│   │   │   └── 📄 TeamController.php
│   │   └── 📂 Requests/
│   │       ├── 📄 ContactRequest.php
│   │       └── 📄 WebsiteSettingsRequest.php
│   ├── 📂 Models/
│   │   ├── 📄 User.php
│   │   ├── 📄 Projects.php
│   │   ├── 📄 ProjectView.php
│   │   ├── 📄 Contact.php
│   │   ├── 📄 Email.php
│   │   └── 📄 Website_settings.php
│   └── 📂 Services/
│       └── 📄 ProjectService.php
├── 📂 config/
├── 📂 database/
│   ├── 📂 migrations/
│   ├── 📂 factories/
│   └── 📂 seeders/
├── 📂 public/
│   ├── 📂 admin/ (Admin Panel Assets)
│   ├── 📂 front/ (Frontend Assets)
│   └── 📂 storage/ (Uploads)
├── 📂 resources/
│   ├── 📂 views/
│   │   ├── 📂 admin/
│   │   ├── 📂 partials/
│   │   ├── 📄 about.blade.php
│   │   ├── 📄 contact.blade.php
│   │   ├── 📄 footer.blade.php
│   │   ├── 📄 header.blade.php
│   │   ├── 📄 hero.blade.php
│   │   ├── 📄 master.blade.php
│   │   └── 📄 portfolio.blade.php
│   ├── 📄 css/app.css
│   └── 📄 js/app.js
├── 📂 routes/
│   └── 📄 web.php
├── 📄 composer.json
├── 📄 package.json
└── 📄 vite.config.js
```

---

## 🗄️ Database Schema

### Core Tables

#### `users` (Extended Laravel Users)
```sql
id, name, email, password, email_verified_at, remember_token
profile_fields: image, designation, facebook_url, linkedin_url, 
              github_url, experience, languages (JSON)
```

#### `projects`
```sql
id, user_id (FK), title, slug (unique), description, thumbnail
github_url, live_url, tech_stack (JSON), views, timestamps
```

#### `project_views` (Analytics)
```sql
id, projects_id (FK), ip_address, created_at, updated_at
```

#### `contacts` (Contact Form)
```sql
id, first_name, last_name, email, phone_number, message, 
created_at, updated_at
```

#### `website_settings` (Dynamic Configuration)
```sql
id, logo, logo_dark, tagline, tagline_h, tagline_p, about_us_img1, 
about_us_img2, what_we_build, why_dev_home, how_we_work, 
footer_des, hero_svg1-4 (longText), timestamps
```

#### `emails` (Email Management)
```sql
id, user_id (FK), email_address, subject, body, 
created_at, updated_at
```

### Laravel System Tables
- `cache`, `jobs`, `sessions` (Database driver)

---

## 🚀 Installation

### 📋 Prerequisites
- **PHP 8.2+**
- **MySQL 5.7+** or **MariaDB**
- **Composer**
- **Node.js 18+** and **NPM**
- **Web Server** (Apache/Nginx with mod_rewrite)

### ⚡ Quick Setup

1. **🌐 Clone the Repository**
```bash
git clone https://github.com/lynsromero/DevHome.git
cd DevHome
```

2. **🔧 Automated Setup** (Recommended)
```bash
composer run setup
```
> This command handles everything: dependencies, environment setup, migrations, and asset building.

3. **🍪 Manual Setup** (Alternative)
```bash
# Install PHP dependencies
composer install

# Copy environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Create database and update .env with your credentials
# Then run migrations
php artisan migrate

# Install Node.js dependencies
npm install

# Build frontend assets
npm run build
```

4. **🚀 Start Development Server**
```bash
# Development mode (runs server, queue, and vite simultaneously)
composer run dev

# Or individual services
php artisan serve          # Laravel server
npm run dev                # Vite development server
php artisan queue:listen   # Queue worker
```

### 🌐 Web Server Configuration

#### Apache
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /path/to/DevHome/public
    
    <Directory /path/to/DevHome/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/DevHome/public;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

---

## ⚙️ Configuration

### 📄 Environment Variables

Key `.env` settings to configure:

```bash
# Application
APP_NAME=DevHome
APP_URL=http://localhost
APP_DEBUG=true

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=developershome
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Session & Cache
SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database

# Mail (for production)
MAIL_MAILER=smtp
MAIL_HOST=your-mail-server
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
```

### 🎨 Customization

#### Logo & Branding
Update through admin panel or modify `website_settings` table:
- `logo` - Light theme logo
- `logo_dark` - Dark theme logo
- `tagline` - Site tagline
- `footer_des` - Footer description

#### Colors & Styling
Edit `resources/css/app.css` and `tailwind.config.js` for custom theming.

---

## 🔧 Development

### 📦 Dependencies

#### PHP Packages (7 total)
- `laravel/framework` ^12.0 - Main framework
- `laravel/tinker` ^2.10.1 - Console tool
- `propaganistas/laravel-phone` ^6.0 - Phone validation

#### Node Packages (6 total)
- `vite` ^7.0.7 - Build tool
- `tailwindcss` ^4.0.0 - CSS framework
- `@tailwindcss/vite` ^4.0.0 - Vite integration
- `laravel-vite-plugin` ^2.0.0 - Laravel integration
- `axios` ^1.11.0 - HTTP client
- `concurrently` ^9.0.1 - Multi-process runner

### 🧪 Testing

```bash
# Run all tests
composer run test
# or
php artisan test

# Run specific test
php artisan test --filter ProjectTest
```

### 📝 Code Quality

```bash
# Code formatting
vendor/bin/pint

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 🔄 Asset Building

```bash
# Development build (with hot reload)
npm run dev

# Production build
npm run build

# Watch for changes
npm run dev -- --watch
```

---

## 📝 API Documentation

### 🌐 Public Routes

| Method | URI | Purpose |
|--------|-----|---------|
| GET | `/` | Home page with projects |
| GET | `/project/{slug}` | Individual project view |
| POST | `/contact-us` | Contact form submission |

### 🔐 Authentication Routes

| Method | URI | Purpose |
|--------|-----|---------|
| GET | `/login` | Login page |
| POST | `/login` | Login processing |
| GET | `/logout` | Logout |

### 🛡️ Protected Admin Routes

| Method | URI | Purpose |
|--------|-----|---------|
| GET | `/dashboard` | Admin dashboard |
| GET | `/profile` | Profile management |
| POST | `/profile-update` | Update profile |
| GET | `/add-project` | Add project form |
| POST | `/store-project` | Save project |
| GET | `/project-list` | List projects |
| POST | `/project-delete/{slug}` | Delete project |

### 🔄 AJAX Endpoints

- **Project Filtering**: `/?filter={technology}` - Returns filtered projects
- **Load More**: `/?filter={tech}&load_all=true` - Loads all projects
- **Contact Submit**: `/contact-us` - Handles contact form with validation

---

## 🚀 Deployment

### 📦 Production Checklist

1. **🔧 Environment Setup**
```bash
APP_ENV=production
APP_DEBUG=false
```

2. **🏗️ Build Assets**
```bash
npm run build
composer install --optimize-autoloader --no-dev
```

3. **🗄️ Database Setup**
```bash
php artisan migrate --force
php artisan db:seed --force
```

4. **⚡ Optimization**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

5. **📁 File Permissions**
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 🐳 Docker Deployment (Optional)

```dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application
COPY . /var/www/html

# Install dependencies
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
```

---

## 🤝 Contributing

### 📋 How to Contribute

1. **🍴 Fork the Repository**
2. **🌿 Create Feature Branch**
```bash
git checkout -b feature/amazing-feature
```

3. **💻 Commit Your Changes**
```bash
git commit -m 'Add amazing feature'
```

4. **📤 Push to Branch**
```bash
git push origin feature/amazing-feature
```

5. **🔄 Open Pull Request**

### 📝 Coding Standards

- Follow **PSR-12** coding standards
- Use **Laravel Pint** for code formatting
- Write **tests** for new features
- Update **documentation** as needed

### 🐛 Bug Reporting

- Use **GitHub Issues** for bug reports
- Include **steps to reproduce**
- Provide **environment details**
- Add **error logs** if available

---

## 🎯 Project Status

> **🚧 Ongoing Project** - This is an actively maintained project with regular updates and improvements.

### ✅ Completed Features
- ✅ Portfolio display system
- ✅ Admin panel with authentication
- ✅ Project CRUD operations
- ✅ AJAX filtering and loading
- ✅ Contact form system
- ✅ Analytics and view tracking
- ✅ Dynamic settings management

### 🚧 In Progress
- 🔄 Enhanced analytics dashboard
- 🔄 Project categories and tags
- 🔄 Multi-language support
- 🔄 Email notifications

### 📋 Planned Features
- 📋 Project commenting system
- 📋 User portfolio sharing
- 📋 Advanced search functionality
- 📋 API for external integrations
- 📋 Mobile app companion

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

## 👥 Contributors

<div align="center">

**Made with ❤️ by [Lyns Romero](https://github.com/lynsromero)**

Special thanks to all contributors who help make this project better!

[![GitHub contributors](https://contrib.rocks/image?repo=lynsromero/DevHome)](https://github.com/lynsromero/DevHome/graphs/contributors)

</div>

---

## 📞 Support

- 📧 **Email**: [sakibramim4@gmail.com]
- 🐛 **Issues**: [GitHub Issues](https://github.com/lynsromero/DevHome/issues)
- 📖 **Documentation**: [Wiki](https://github.com/lynsromero/DevHome/wiki)

---

<div align="center">

**⭐ Star this repository if it helped you!**

[🔝 Back to top](#devhome---developer-portfolio-platform)

</div>