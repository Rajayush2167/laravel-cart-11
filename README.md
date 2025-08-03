# 🛒 Laravel Shopping Cart - Ayush Raj

A simple and elegant Shopping Cart system built using Laravel 11. This project allows users to view books, add to cart, increase/decrease quantity, and remove items from the cart.

---

## 📁 Project Features

- List all available books with images, authors, and price
- Add books to the shopping cart
- Increase/decrease quantity of books in the cart
- Remove individual books from the cart
- View cart total


---

## 🚀 Requirements

- Composer
- Laravel 11
- MySQL or any supported DB
- 

---

## ⚙️ Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/laravel-cart.git
cd laravel-cart

cp .env.example .env
php artisan key:generate

DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=your_password
php artisan migrate --seed

🛒 How to Run Laravel Cart Project

php artisan serve

Now open in your browser:


http://127.0.0.1:8000/dashboard
