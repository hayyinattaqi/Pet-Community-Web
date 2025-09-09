<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  
    <?php
    // Include the header file  
    $activePage = 'about'; // Set the active page for the navigation
    include 'includes/header.php';
    ?>

    <section class="about__hero p-4 text-black">
      <div class="container-fluid">
        <h1 class="hero__title">About Us</h1>
        <p>"Learn about our mission, story, and the incredible impact we've <br>
            made together in the pet community
        </p>
      </div>
    </section>

    <section class="about__mission p-4 text-center">
        <div class="container-fluid">
            <i class="fas fa-bullseye fa-lg"></i>
            <h2 class="about__mission-title">Misi Kami</h2>
            <p>To create a compassionate community where every pet receives 
                the love, care, and respect they deserve. We are dedicated to rescuing animals in 
                need, providing medical care, educating the public about responsible pet ownership, 
                and ensuring no animal goes hungry on our streets.
            </p>
        </div>
    </section>

    <section class="about__story p-4 bg-light text-center">
        <div class="container-fluid">
            <i class="fas fa-book fa-lg"></i>
            <h2 class="about__story-title">Kisah Kami</h2>
            <p>PetCommunity was founded in 2020 by a group of passionate animal lovers who saw the 
                urgent need for a dedicated organization to protect and care for pets in our community. 
                Since then, we have grown into a vibrant network of volunteers, donors, and supporters 
                who share our vision of a world where every pet is cherished and protected.
            </p>

            <div class="card p-3 text-start mx-auto " style="max-width: 600px;">
                <div class="card-body">
                    <h5 class="card-title text-center">Our Journey</h5>
                    <ul>
                        <li>2022: Founded with 5 volunteers</li>
                        <li>2023: First 100 pets rescued</li>
                        <li>2024: Reached 150 volunteers and expanded to include educational programs</li>
                        <li>2025: 500+ pets helped</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about__our-impact p-4 text-center">
        <div class="container-fluid">
            <i class="fas fa-users fa-lg"></i>
            <h2 class="about__impact-title">Dampak yang Kami Ciptakan</h2>

            <p>Through our rescue efforts, we have saved over 500 animals from neglect and abuse, 
                provided medical care to hundreds of pets, and educated thousands of people about the 
                importance of responsible pet ownership. Our community outreach programs have also 
                helped reduce the number of stray animals on the streets.</p>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4 ">
                    <div class="card h-100 red">
                        <div class="card-body">
                            <div class="stats-icon bg-blue-light">
                                <i class="fas fa-heart fa-lg"></i>
                            </div>
                            <h4 class="about__our-impact-card-title">500+</h4>
                            <h5 class="card-title ">Pets Rescued</h5>
                            <p class="card-text">Animals saved from dangerous situations and given new loving homes</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 blue">
                        <div class="card-body">
                            <div class="stats-icon bg-blue-light">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                            <h4 class="about__our-impact-card-title">200+</h4>
                            <h5 class="card-title">Active Volunteers</h5>
                            <p class="card-text">Dedicated community members working to make a difference</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 green">
                        <div class="card-body">
                            <div class="stats-icon bg-blue-light">
                                <i class="fas fa-stethoscope fa-lg"></i>
                            </div>                
                            <h4 class="about__our-impact-card-title">1000+</h4>
                            <h5 class="card-title">Penanganan Medis</h5>
                            <p class="card-text">Veterinary services provided to animals in need</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 blueberry-light">
                        <div class="card-body">
                            <div class="stats-icon bg-blue-light">
                                <i class="fas fa-lightbulb fa-lg"></i>
                            </div>                
                            <h4 class="about__our-impact-card-title">50+</h4>
                            <h5 class="card-title">Education Programs</h5>
                            <p class="card-text">Community workshops on responsible pet ownership.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Include the footer file  
    include 'includes/footer.php';
    ?>

  </body>
</html>   
