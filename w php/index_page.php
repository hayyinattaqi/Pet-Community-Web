<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Community - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-paw me-2"></i>Pet Community
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Our Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donations.php">Donations</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-3 fw-bold text-white mb-4">
                            Welcome to Pet Community
                        </h1>
                        <p class="lead text-white mb-4">
                            We are a dedicated community working together to rescue, care for, and protect animals in need. 
                            Join us in making a difference in the lives of our furry friends.
                        </p>
                        <div class="hero-buttons">
                            <a href="about.php" class="btn btn-light btn-lg me-3">
                                <i class="fas fa-heart me-2"></i>Learn About Us
                            </a>
                            <a href="programs.php" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-paw me-2"></i>Our Programs
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Happy pets" class="img-fluid rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-heart text-primary fa-3x mb-3"></i>
                        <h3 class="fw-bold">150+</h3>
                        <p class="text-muted">Pets Rescued</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-users text-success fa-3x mb-3"></i>
                        <h3 class="fw-bold">50+</h3>
                        <p class="text-muted">Active Volunteers</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-calendar text-warning fa-3x mb-3"></i>
                        <h3 class="fw-bold">25+</h3>
                        <p class="text-muted">Programs Completed</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <i class="fas fa-map-marker-alt text-danger fa-3x mb-3"></i>
                        <h3 class="fw-bold">10+</h3>
                        <p class="text-muted">Feeding Locations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Programs Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">Our Recent Programs</h2>
                    <p class="text-muted">Check out some of our latest initiatives</p>
                </div>
            </div>
            <div class="row">
                <?php
                $pdo = getConnection();
                $stmt = $pdo->prepare("SELECT p.*, pic.nama_PIC FROM programs p LEFT JOIN pic ON p.id_PIC = pic.id_PIC ORDER BY p.tanggal_mulai DESC LIMIT 3");
                $stmt->execute();
                $programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($programs as $program):
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <?php
                                $icon = '';
                                $color = '';
                                switch($program['kategori_program']) {
                                    case 'rescue': $icon = 'fa-hand-holding-heart'; $color = 'text-danger'; break;
                                    case 'medical': $icon = 'fa-stethoscope'; $color = 'text-success'; break;
                                    case 'education': $icon = 'fa-graduation-cap'; $color = 'text-primary'; break;
                                    case 'feeding': $icon = 'fa-utensils'; $color = 'text-warning'; break;
                                }
                                ?>
                                <i class="fas <?php echo $icon; ?> <?php echo $color; ?> fa-2x me-3"></i>
                                <div>
                                    <h5 class="card-title mb-0"><?php echo htmlspecialchars($program['nama_program']); ?></h5>
                                    <small class="text-muted text-capitalize"><?php echo $program['kategori_program']; ?></small>
                                </div>
                            </div>
                            <p class="card-text"><?php echo htmlspecialchars($program['deskripsi']); ?></p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    <?php echo date('M d, Y', strtotime($program['tanggal_mulai'])); ?>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <a href="programs.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-eye me-2"></i>View All Programs
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-paw me-2"></i>Pet Community
                    </h5>
                    <p class="mb-3">
                        Dedicated to rescuing, caring for, and protecting animals in need. 
                        Together, we make a difference.
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="about.php" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="programs.php" class="text-white-50 text-decoration-none">Programs</a></li>
                        <li><a href="contact.php" class="text-white-50 text-decoration-none">Contact</a></li>
                        <li><a href="donations.php" class="text-white-50 text-decoration-none">Donations</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Connect With Us</h6>
                    <div class="social-links">
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white-50 me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Pet Community. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>