<!DOCTYPE html>
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
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
        <?php
        // Include the header file  
        $activePage = 'contact'; // Set the active page for the navigation
        include 'includes/header.php';
        ?>

        <section class="contact__hero p-4 bg-dark text-white">
            <div class="container-fluid text-center">
                <h1 class="hero__title">Contact Us</h1>
            </div>
        </section>

        <section class="contact-cards p-4 max-width-1200 mx-auto">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="card m-3 p-4 shadow-sm ">
                            <div class="icontitle d-flex align-items-center gap-3">
                                <i class="fas fa-location-dot fa-lg"></i>
                                <h5 class="card-title mb-0">Kunjungi Kami</h5>
                            </div>
                            <p class="card-text mt-4">
                                Jl. Alamat No.123 <br>
                                Kota ABC <br>
                                Provinsi XYZ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card m-3 p-4 shadow-sm">
                            <div class="icontitle d-flex align-items-center gap-3">
                                <i class="fas fa-phone fa-lg"></i>
                                <h5 class="card-title mb-0">Hubungi Kami</h5>
                            </div>
                            <p class="card-text mt-4">
                                Main Office: +62 (021) 123-4567 <br>
                                Layanan Darurat: +62 (021) 987-6543 <br>
                                Hotline Relawan: +62 (021) 456-7890
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card m-3 p-4 shadow-sm">
                            <div class="icontitle d-flex align-items-center gap-3">
                                <i class="fas fa-envelope fa-lg"></i>
                                <h5 class="card-title mb-0">Kirim Surel</h5>
                            </div>
                            <p class="card-text mt-4">
                                Informasi Umum: info@petcommunity.org  <br>
                                Relawan: volunteer@petcommunity.org<br>
                                Donasi: donate@petcommunity.org
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card m-3 p-4 shadow-sm">
                            <div class="icontitle d-flex align-items-center gap-3">
                                <i class="fas fa-clock fa-lg"></i>
                                <h5 class="card-title mb-0">Jam Operasional</h5>
                            </div>
                            <p class="card-text mt-4">
                                Senin - Jumat: 9:00 WIB - 18:00 WIB  <br>
                                Sabtu: 10:00 WIB - 16:00 WIB<br>
                                Minggu: 12:00 WIB - 16:00 WIB <br>
                            </p>
                            <p class="mb-0" style="color: green">Layanan Darurat tersedia 24/7</p>
                        </div>
                    </div>
                </div>

                <div class="map-section p-4">
                    <h3 class="mb-3">Lokasi Kami</h3>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1499002422825!2d110.37242349999998!3d-7.773924999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a584a6eaf7cbb%3A0x294cd98559dc9c8c!2sVocational%20College%20UGM!5e0!3m2!1sen!2sid!4v1750399266241!5m2!1sen!2sid" 
                            width="600" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
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
