<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🛒 Laravel 11 Shopping Cart | Ayush Raj</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to right top, #f5f7fa, #c3cfe2);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            background-attachment: fixed;
        }

        .navbar {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #2c3e50 !important;
        }

        .btn-cart {
            position: relative;
            transition: all 0.3s ease;
            border-radius: 50px;
        }

        .btn-cart:hover {
            background: #34495e;
            color: #fff;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e74c3c;
            color: #fff;
            border-radius: 50%;
            font-size: 12px;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: glow 1.5s infinite alternate;
            box-shadow: 0 0 8px rgba(231, 76, 60, 0.7);
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 5px rgba(231, 76, 60, 0.3);
            }
            to {
                box-shadow: 0 0 15px rgba(231, 76, 60, 0.9);
            }
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 40px 30px;
            margin-top: 40px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .main-content:hover {
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        }

        .alert-success {
            border-left: 5px solid #2ecc71;
            background-color: #e9f7ef;
            color: #27ae60;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }

        footer a {
            color: #2c3e50;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🛍️ Ayush Raj</a>
        <div class="ms-auto">
            <a class="btn btn-outline-dark btn-cart" href="{{ route('shopping.cart') }}">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-badge">{{ count((array) session('cart')) }}</span>
            </a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container main-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<!-- Footer -->
<footer>
    &copy; {{ now()->year }} <a href="#">Ayush Raj</a> — All rights reserved.
</footer>

@yield('scripts')
</body>
</html>
