<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'GPMS') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .navbar-brand {
            font-weight: 700;
            color: #0d6efd !important;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            margin-left: 1rem;
            transition: color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: #0d6efd !important;
        }
        .btn-auth-login {
            border: 1px solid #0d6efd;
            color: #0d6efd;
            font-weight: 600;
        }
        .btn-auth-login:hover {
            background-color: #0d6efd;
            color: white;
        }
        .btn-auth-register {
            background-color: #0d6efd;
            color: white;
            font-weight: 600;
        }
        .btn-auth-register:hover {
            background-color: #0b5ed7;
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
            color: white;
            padding: 150px 0;
            position: relative;
            overflow: hidden;
        }
        .hero-content h1 {
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }
        .hero-content p {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            font-weight: 300;
        }
        .btn-hero {
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 5px;
            background-color: white;
            color: #0d6efd;
            border: none;
            transition: transform 0.1s, background-color 0.2s, color 0.2s;
        }
        .btn-hero:hover {
            transform: translateY(-2px);
            background-color: #f0f0f0;
            color: #0b5ed7;
        }
        .btn-hero:active {
            transform: scale(0.95);
            background-color: #f0f0f0;
            color: #0b5ed7;
        }

        /* Features Section */
        .features-section {
            padding: 80px 0;
            background-color: white;
        }
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        .section-title h2 {
            font-weight: 700;
            color: #222;
            margin-bottom: 15px;
        }
        .section-title p {
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto;
        }
        .feature-card {
            border: none;
            border-radius: 10px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .feature-card h4 {
            font-weight: 600;
            margin-bottom: 15px;
        }
        .feature-card p {
            color: #6c757d;
            line-height: 1.6;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
            background-color: #f1f3f5;
        }

        /* Footer */
        .footer {
            background-color: #212529;
            color: rgba(255,255,255,0.7);
            padding: 60px 0 20px;
        }
        .footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .footer ul li {
            margin-bottom: 10px;
        }
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer a:hover {
            color: white;
        }
        .footer-bottom {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-controller me-2"></i>GPMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-auth-login">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-auth-login">Log in</a>
                        <a href="{{ url('/register') }}" class="btn btn-auth-register">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Manage Your Game Projects Like a Pro</h1>
                    <p>Streamline your game development workflow. Track tasks, collaborate with your team, and ship your games faster with our all-in-one Project Management System.</p>
                    <div class="d-flex gap-3">
                         <a href="{{ url('/register') }}" class="btn btn-hero">Start Creating <i class="bi bi-arrow-right ms-2"></i></a>
                         <a href="#" class="btn btn-outline-light rounded px-4 py-2" style="border: 1px solid rgba(255,255,255,0.5);">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <!-- Placeholder animation/image -->
                    <img src="https://via.placeholder.com/600x400/0056b3/ffffff?text=Game+Dev+Dashboard" alt="Dashboard Preview" class="img-fluid rounded shadow-lg" style="transform: rotate(-2deg); border: 4px solid rgba(255,255,255,0.2);">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose GPMS?</h2>
                <p>Designed specifically for game developers and studios to handle the complexities of game production.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-kanban"></i>
                        </div>
                        <h4>Task Tracking</h4>
                        <p>Visualize your workflow with Kanban boards customized for art, code, and design pipelines.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Team Collaboration</h4>
                        <p>Real-time updates, comments, and file sharing to keep your distributed team in sync.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <h4>Development Timeline</h4>
                        <p>Plan milestones, sprints, and release dates with our interactive Gantt charts.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-bug-fill"></i>
                        </div>
                        <h4>Bug Tracking</h4>
                        <p>Integrated QA tools to report, track, and squash bugs before launch day.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://via.placeholder.com/600x400/ced4da/6c757d?text=About+Us+Image" alt="About System" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Built for Developers, by Developers</h2>
                    <p class="lead text-secondary mb-4">GPMS understands the unique challenges of game development. From asset management to code reviews, we've got you covered.</p>
                    <p class="mb-4">Our platform integrates seamlessly with popular version control systems and provides detailed analytics on your team's velocity and productivity. Stop wrestling with generic project management tools and start using one made for your craft.</p>
                    <a href="#" class="btn btn-outline-primary btn-lg">Read Our Story</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="d-flex align-items-center"><i class="bi bi-controller me-2"></i> GPMS</h5>
                    <p class="small">The ultimate project management solution for game studios of all sizes. Organize, collaborate, and create amazing games.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5>Product</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">Changelog</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Stay Updated</h5>
                    <p class="small">Subscribe to our newsletter for the latest game dev tips.</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter your email" aria-label="Recipient's email">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; {{ date('Y') }} GPMS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
