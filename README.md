# 📊 Sales Dashboard - Laravel Application

> Professional sales dashboard with real-time analytics, trend visualization, and comprehensive reporting features.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## 🌟 Features

- **📈 Real-time Analytics Dashboard** - Interactive charts and statistics
- **🔍 Advanced Filtering** - Filter sales by date range
- **📊 Multiple Chart Types** - Daily trends, monthly comparison, product analysis
- **📱 Responsive Design** - Works on desktop, tablet, and mobile
- **⚡ High Performance** - Optimized queries with proper indexing
- **🎨 Modern UI** - Clean interface with Bootstrap 5 and Chart.js
- **📑 Detailed Reports** - Comprehensive sales data with pagination

## 🖼️ Screenshots

### Dashboard Overview
```
┌─────────────────────────────────────────────────────┐
│  Statistics Cards: Total Sales, Transactions, etc   │
├─────────────────────────────────────────────────────┤
│  📈 Daily Trends Chart  │  🏆 Top Products Chart    │
├─────────────────────────────────────────────────────┤
│           📊 Monthly Sales Chart                    │
├─────────────────────────────────────────────────────┤
│        📋 Detailed Sales Table with Filters         │
└─────────────────────────────────────────────────────┘
```

## 🚀 Quick Start

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL >= 5.7 or SQLite
- Node.js & NPM (optional)

### Local Installation

1. **Clone the repository**
```bash
git clone https://github.com/julian-21/project.git
cd sales-dashboard
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database** (edit `.env`)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_fikri
DB_USERNAME=root
DB_PASSWORD=your_password
```

5. **Run migrations and seeders**
```bash
php artisan migrate --seed
```

6. **Start development server**
```bash
php artisan serve
```

7. **Access the application**
```
http://localhost:8000
```

## 🔧 Configuration

### Database Options

#### MySQL (Recommended for Production)
```env
DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=3306
DB_DATABASE=project_fikri
DB_USERNAME=your-user
DB_PASSWORD=your-password
```

## 📦 Project Structure

```
sales-dashboard/
├── app/
│   ├── Http/Controllers/
│   │   └── SalesController.php      # Main dashboard controller
│   ├── Models/
│   │   ├── Product.php              # Product model
│   │   └── Sale.php                 # Sale model with scopes
│   └── Services/
│       └── SalesReportService.php   # Business logic layer
├── database/
│   ├── migrations/                  # Database schema
│   └── seeders/                     # Sample data generators
├── resources/
│   └── views/
│       ├── layouts/app.blade.php    # Main layout
│       └── sales/dashboard.blade.php # Dashboard view
└── routes/
    └── web.php                      # Application routes
```

## 🌐 Deployment

### Deploy to Railway

1. **Create new project on Railway**
   - Go to [Railway](https://railway.app)
   - Click "New Project" → "Deploy from GitHub repo"
   - Select your repository

2. **Add MySQL database**
   - Click "New" → "Database" → "Add MySQL"
   - Railway will automatically set environment variables

3. **Configure environment variables**
   - Add `APP_KEY` (generate with: `php artisan key:generate --show`)
   - Set `APP_ENV=production`
   - Set `APP_DEBUG=false`
   - Database variables are auto-configured

4. **Deploy**
   - Railway will automatically deploy using `nixpacks.toml`
   - Access your app at the provided URL

### Deploy to Render

1. **Create new Web Service**
   - Go to [Render Dashboard](https://dashboard.render.com)
   - Click "New" → "Web Service"
   - Connect your GitHub repository

2. **Configure service**
   - Name: `sales-dashboard`
   - Environment: `PHP`
   - Build Command: `./build.sh`
   - Start Command: `php artisan serve --host=0.0.0.0 --port=$PORT`

3. **Add MySQL database**
   - Create new PostgreSQL/MySQL database
   - Copy connection details

4. **Set environment variables**
```
APP_NAME=Sales Dashboard
APP_ENV=production
APP_KEY=[generated key]
APP_DEBUG=false
APP_URL=https://your-app.onrender.com
DB_CONNECTION=mysql
DB_HOST=[from render]
DB_PORT=3306
DB_DATABASE=[from render]
DB_USERNAME=[from render]
DB_PASSWORD=[from render]
```

5. **Deploy**
   - Click "Create Web Service"
   - Render will build and deploy automatically

### Deploy to Vercel (with Serverless MySQL)

**Note**: Vercel is better suited for static/serverless apps. For full Laravel apps, Railway or Render is recommended.

```bash
# Install Vercel CLI
npm i -g vercel

# Deploy
vercel --prod
```

## 📊 Database Schema

### Products Table
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar | Product name |
| sku | varchar | Unique SKU |
| description | text | Product details |
| price | decimal | Product price |
| stock | integer | Available quantity |

### Sales Table
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| product_id | bigint | Foreign key to products |
| sale_date | date | Date of sale |
| quantity | integer | Items sold |
| unit_price | decimal | Price per unit |
| total_price | decimal | Total amount |
| customer_name | varchar | Customer name |
| invoice_number | varchar | Unique invoice ID |

## 🎯 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/` | Redirect to dashboard |
| GET | `/sales/dashboard` | Main dashboard with filters |
| GET | `/sales/dashboard?start_date=YYYY-MM-DD&end_date=YYYY-MM-DD` | Filtered dashboard |
| GET | `/health` | Health check endpoint |

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter SalesControllerTest
```

## 🔐 Security

- CSRF protection enabled
- SQL injection prevention via Eloquent ORM
- XSS protection in Blade templates
- Environment variables for sensitive data
- Input validation on all forms

## 📈 Performance Optimization

- Database indexes on frequently queried columns
- Query result caching
- Eager loading relationships
- Pagination for large datasets
- Denormalized `total_price` for faster calculations

## 🛠️ Maintenance

### Clear caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Optimize for production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

### Database backup
```bash
# MySQL
mysqldump -u username -p database_name > backup.sql

# Restore
mysql -u username -p database_name < backup.sql
```
