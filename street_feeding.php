<?php
if (!isset($conn)) {
    include 'config.php';
}
$query = "SELECT lokasi, waktu FROM street_feeding ORDER BY waktu ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Street Feeding Program</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    .streetfeed{
        background: linear-gradient(to bottom, #d4fcd6, #eafff4);
    }
    .card-box {
        background: #fff;
        border-radius: 10px;
        padding: 1rem;
        box-shadow: 0 0 5px rgba(0,0,0,0.05);
    }
    .schedule-icon {
        font-size: 2rem;
        color: green;
    }
    .location-box {
        background-color: #f1fff7;
        border-radius: 8px;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 0 3px rgba(0,0,0,0.05);
    }
    .location-box + .location-box {
        margin-top: 0.75rem;
    }
  </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div id="street-feeding-section" style="display: none;">
        <div class="streetfeed py-5 text-center">
            <div class="mb-4">
                <div class="display-4 text-success">📍</div>
                <h2 class="fw-bold">Street Feeding Program</h2>
                <p class="text-muted">Our dedicated street feeding program ensures no stray animal goes hungry.<br>Check out our feeding schedule and locations below.</p>
            </div>

            <div class="card card-box text-start mx-auto p-5" style="max-width: 700px;">
                <div class="mb-3">
                    <h5 class="fw-bold text-success">
                        <span class="me-2">🕒</span>Feeding Schedule
                    </h5>
                    <p class="text-muted">Our volunteers feed stray animals at scheduled times in various locations.</p>
                </div>

                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-12 mb-3 col-md-6 col">
                        <div class="location-box">
                            <div>
                                <strong><?= htmlspecialchars($row['lokasi']) ?></strong><br>
                                <small><?= date("d/m/Y \a\\t H:i", strtotime($row['waktu'])) ?></small>
                            </div>
                            <div>📍</div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <div class="text-center mt-4">
                    <p>Ingin bergabung sebagai relawan untuk program Street Feeding?</p>
                    <a href="register.php" class="btn btn-success">Gabung sebagai Relawan</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
