<?php
include 'config.php'; // file koneksi ke database
$activePage = 'program'; 
// Ambil data program dari database
$query = "SELECT * FROM programs";
$result = mysqli_query($conn, $query);

// Mapping kategori ke ikon dan warna background
function getCategoryIcon($kategori) {
    return match($kategori) {
        'rescue' => '❤️',
        'medical' => '🩺',
        'education' => '🎓',
        'feeding' => '📍',
        default => '❓',
    };
}
?>
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
        $activePage = 'program'; // Set the active page for the navigation
        include 'includes/header.php';
        ?>

        <section class="program__hero p-4">
            <div class="container-fluid">
                <h1 class="hero__title">Our Programs</h1>
                <p>"Bergabunglah dengan program kami untuk membuat perbedaan nyata dalam 
                    kehidupan hewan peliharaan di komunitas kita."</p>
            </div>
        </section>

        <section class="program-cards p-4">
            <div class="container-fluid">
                <!-- Filter Buttons -->
                <div class="category-button mb-4 d-flex gap-2 justify-content-center">
                    <button class="btn btn-outline-primary btn-filter active" data-category="all">All Programs</button>
                    <button class="btn btn-outline-primary btn-filter" data-category="rescue">Rescue</button>
                    <button class="btn btn-outline-primary btn-filter" data-category="medical">Medical</button>
                    <button class="btn btn-outline-primary btn-filter" data-category="education">Education</button>
                    <button class="btn btn-outline-primary btn-filter" data-category="feeding">Street Feeding</button>
                </div>

                <!-- Program Cards -->
                <div class="row g-4 p-3" id="programs" >
                    <?php while($program = mysqli_fetch_assoc($result)): 
                    $kategori = $program['kategori_program'] ?? 'unknown';
                    $bgColor = match($kategori) {
                        'rescue' => 'border-danger',
                        'medical' => 'border-success',
                        'education' => 'border-primary',
                        'feeding' => 'border-success',
                        default => 'border-secondary',
                    };
                    $tanggal_mulai = date("d/m/Y", strtotime($program['tanggal_mulai']));
                    $tanggal_selesai = $program['tanggal_selesai'] ? date("d/m/Y", strtotime($program['tanggal_selesai'])) : 'Tidak ditentukan';
                    $status = $program['status'] ?? 'unknown';
                    // Set warna status berdasarkan status program
                    $statusWarna = match($status) {
                        'aktif' => 'green',
                        'selesai' => 'gray',
                        'batal' => 'red',
                        default => 'blue',
                    };
                    ?>
                    <div class="col-md-6 col-lg-4 program-card" data-category="<?= $kategori ?>">
                        <div class="card border <?= $bgColor ?> h-100">
                            <div class="card-body p-4">
                                <div class="justify-content-between d-flex flex-row align-items-center"> 
                                    <h2><?= getCategoryIcon($kategori) ?></h2>
                                    <span class="tag"  style="background-color: lightgray"><?= ucfirst($kategori) ?></span>
                                </div>
                                <h5 class="fw-bold"><?= htmlspecialchars($program['nama_program']) ?></h5>
                                <p><?= htmlspecialchars($program['deskripsi']) ?></p>
                                <p><i class="bi bi-calendar"></i> <?= $tanggal_mulai ?> - <?= $tanggal_selesai ?></p>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot" style="background-color: <?= $statusWarna ?>"></span>
                                    <p class="text-<?= $statusWarna ?> m-0">
                                        <?= $program['status'] === 'draft' ? 'Segera Hadir' : ucfirst($program['status']) ?>
                                    </p>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>    
        </section>

        <?php
        include 'street_feeding.php'; // file koneksi ke database
        ?>

        <?php
        // tambhahkan footer
        include 'includes/footer.php';
        mysqli_close($conn); // Tutup koneksi database
        ?>

        <script>
        const buttons = document.querySelectorAll('.btn-filter');
        const cards = document.querySelectorAll('.program-card');
        const feedingSection = document.getElementById('street-feeding-section');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const category = btn.dataset.category;

            // Show/hide program cards
            cards.forEach(card => {
                card.style.display = (category === 'all' || card.dataset.category === category) ? 'block' : 'none';
            });

            // nampilin jadwal street feeding
            if (category === 'all' || category === 'feeding') {
                feedingSection.style.display = 'block';
            } else {
                feedingSection.style.display = 'none';
            }
            });
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>


