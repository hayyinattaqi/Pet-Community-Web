<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  
    <?php
    // Include the header file   
    $activePage = 'home'; // Set the active page for the navigation   
    include 'includes/header.php';
    ?>

      <section class="hero ">
        <div class="container-fluid text-center">
          <h1 class="hero__title mt-3" style="font-family: Rubik Bubbles; font-size: 3.5rem; color:#4066cf ">PetCommunity</h1>
          <h5 class="mt-3" style="font-family: Poppins; color:#4066cf">"Rawat, Sayangi, Lindung"<br> 
            Temukan kisah, aksi nyata, dan cara mudah untuk 
  berkontribusi dalam menyayangi dan melindungi 
  bersama kami</h5>
          <a href="about.php" class="btn btn-outline-primary">Ketahui Lebih Banyak</a>
        </div>
      </section>

    <div class="container-fluid p-4">

      <section class="stats py-5 p-4">
        <div class="container-fluid">
          <div class="row text-center justify-content-center g-4">
            <!-- Stat 1 -->
            <div class="col-lg-4">
              <div class="stats-icon bg-pink-light">
                <i class="fas fa-paw fa-lg"></i>
              </div>
              <div class="stat-number"><b>300+</b></div>
              <div class="stat-label">Hewan Mendapat Kesempatan <br>Lebih Baik</div>
            </div>
            <!-- Stat 2 -->
            <div class="col-lg-4">
              <div class="stats-icon bg-green-light">
                <i class="fas fa-user fa-lg"></i>
              </div>
              <div class="stat-number"><b>200+</b></div>
              <div class="stat-label">Relawan Aktif</div>
            </div>
            <!-- Stat 3 -->
            <div class="col-lg-4">
              <div class="stats-icon bg-blue-light">
                <i class="fas fa-stethoscope fa-lg"></i>
              </div>
              <div class="stat-number"><b>30+</b></div>
              <div class="stat-label">Bantuan Medis untuk Hewan Jalanan</div>
            </div>
          </div>
        </div>
      </section>

      <section class="programs p-4">
        <div class="container-fluid text-center">
          <h3 style="font-weight: 60px; text-align: center">Program Kami</h2>
          <p style="text-align: center">"Yuk, lihat bagaimana kami peduli pada hewan peliharaan dan ikut berkontribusi untuk komunitas sekitar."</p>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <div class="card green">
                <div class="card-body">
                  <div class="stats-icon bg-blue-light">
                    <i class="fas fa-stethoscope fa-lg"></i>
                  </div>
                  <h5 class="card-title">Medical</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <div class="card red">
                <div class="card-body">
                  <div class="stats-icon bg-blue-light">
                    <i class="fas fa-heart fa-lg"></i>
                  </div>
                  <h5 class="card-title">Rescue</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <div class="card blue">
                <div class="card-body">
                  <div class="stats-icon bg-blue-light">
                    <i class="fas fa-graduation-cap fa-lg"></i>
                  </div>
                  <h5 class="card-title">Education</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <div class="card yellow">
                <div class="card-body">
                  <div class="stats-icon bg-blue-light">
                    <i class="fas fa-location-dot fa-lg"></i>
                  </div>
                  <h5 class="card-title">Street Feeding</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
            </div>
          </div>

          <a href="program.php" class="btn btn-outline-primary">Lihat Seluruh Program</a>
        </div>
      </section>

      <section class="get-involved p-4 text-center">
        <div class="container-fluid">
          <h3 style="font-weight: bold;">Ayo Ikut Terlibat dan Berkontribusi </h2>
          <div class="row mt-4">
            <div class="col-lg-4  col-sm-12 mb-4">
              <i class="fas fa-phone fa-lg"></i>
              <h5>Hubungi Kami</h5>
              <p>021-1234-5678</p>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
              <i class="fas fa-envelope fa-lg"></i>
              <h5>Hubungi Kami</h5>
              <p>021-1234-5678</p>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
              <i class="fas fa-location-dot fa-lg"></i>
              <h5>Hubungi Kami</h5>
              <p>021-1234-5678</p>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
    // Include the footer file  
    include 'includes/footer.php';
    ?>

  </body>
</html>