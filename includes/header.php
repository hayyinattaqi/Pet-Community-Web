<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
    .navbar {
    padding: 0.5rem 1rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar-brand{
    background-color: #f8f9fa;
    font-family: "Darumadrop One", sans-serif;
    font-size: 1.8rem !important;
    font-weight: 500;
    color: #0e0d0d;
    align-items: center;
    display: flex;
    gap: 0.5rem;
    }
    .navbar-brand img {
    width: 30px;
    height: 24px;
    }
    </style>
</head>
<body>
<section class="header">
    <nav class="navbar p-2 fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-3">
            <a class="navbar-brand" href="index.php">
                <img src="assets/star.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <p style="margin: 0">PetCommunity</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == 'home') ? 'active' : '' ?>" 
                           <?= ($activePage == 'home') ? 'aria-current="page"' : '' ?> 
                           href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == 'about') ? 'active' : '' ?>" 
                           <?= ($activePage == 'about') ? 'aria-current="page"' : '' ?> 
                           href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == 'program') ? 'active' : '' ?>" 
                           <?= ($activePage == 'program') ? 'aria-current="page"' : '' ?> 
                           href="program.php">Our Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == 'contact') ? 'active' : '' ?>" 
                           <?= ($activePage == 'contact') ? 'aria-current="page"' : '' ?> 
                           href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == 'donations') ? 'active' : '' ?>" 
                           <?= ($activePage == 'donations') ? 'aria-current="page"' : '' ?> 
                           href="donations.php">Donations</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary">
                            <a style="text-decoration: none; color: white" href="login.php">
                                Member Login</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
</body>
</html>
