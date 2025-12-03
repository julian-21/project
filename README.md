# 📊 Sales Dashboard - Laravel Application

> Professional sales dashboard with real-time analytics, trend visualization, and comprehensive reporting features.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
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
### Access Demo 
project-fikri.up.railway.app
