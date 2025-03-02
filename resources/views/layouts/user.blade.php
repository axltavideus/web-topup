<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="/">Logo</a>
        </div>
        <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        <div class="navbar-actions">
            <a href="/login" class="btn-login">Login</a>
            <a href="/register" class="btn-register">Register</a>
        </div>
    </nav>
</header>

    <main>
        @yield('content')
    </main>

    <footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Wenstein store adalah tempat top up games yang aman, murah dan terpercaya. Proses cepat 1-3 Detik. Open 24 jam. Payment terlengkap. Jika ada kendala silahkan klik logo CS di bagian kanan bawah di website ini.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: info@example.com</p>
            <p>Phone: +123 456 7890</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Company. All rights reserved.</p>
    </div>
</footer>
<style>
/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background-color: #333;
    color: white;
}

.navbar-brand a {
    color: white;
    text-decoration: none;
    font-size: 1.5rem;
}

.navbar-nav {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.navbar-nav li {
    margin-left: 1rem;
}

.navbar-nav a {
    color: white;
    text-decoration: none;
}

.navbar-actions .btn-login,
.navbar-actions .btn-register {
    padding: 0.5rem 1rem;
    margin-left: 1rem;
    text-decoration: none;
    color: white;
    background-color: #555;
    border-radius: 5px;
}

.navbar-actions .btn-register {
    background-color: #007bff;
}

/* Footer Styles */
footer {
    background-color: #333;
    color: white;
    padding: 2rem 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1rem;
}

.footer-section {
    max-width: 300px;
}

.footer-section h3 {
    margin-bottom: 1rem;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
}

.footer-bottom {
    border-top: 1px solid #444;
    padding-top: 1rem;
}
</style>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>