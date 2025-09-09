<?php
// donations.php
include 'config.php';
$activePage = 'donations';
include 'includes/header.php';

// kueri untuk mengambil data donasi
$sql = "SELECT nama_donatur, nominal, tanggal_donasi, metode_donasi FROM donations ORDER BY tanggal_donasi DESC";
$result = mysqli_query($conn, $sql);

//fungsi untuk memformat metode donasi

function formatMetode($metode) {
  return match($metode) {
    'transfer_bank' => ['Bank Transfer', 'success', 'fa-building-columns'],
    'e_wallet' => ['E-Wallet', 'info', 'fa-wallet'],
    'cash' => ['Cash', 'secondary', 'fa-money-bill'],
    'other' => ['QRIS', 'primary', 'fa-qrcode'],
    default => ['Other', 'dark', 'fa-question']
  };
}

// Tjumlah total donasi
$resultTotal = $conn->query("SELECT SUM(nominal) AS total_donasi FROM donations");
$total_donasi = $resultTotal->fetch_assoc()['total_donasi'] ?? 0;

// banyak donatur 9unik)
$resultDonor = $conn->query("SELECT COUNT(DISTINCT nama_donatur) AS total_donatur FROM donations");
$total_donatur = $resultDonor->fetch_assoc()['total_donatur'] ?? 0;

// ngitung rerata donasi
$resultAvg = $conn->query("SELECT AVG(nominal) AS avg_donasi FROM donations");
$avg_donasi = $resultAvg->fetch_assoc()['avg_donasi'] ?? 0;

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recent Donations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .donation-method {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-weight: 500;
    }
    .table td, .table th {
      vertical-align: middle;
      text-align: start;
    }
    .table th {
      color: #6c757d;
    }
    .amount {
      color: green;
    }
    .card{
      text-align: center;
    }
    .container {
      max-width: 1000px;
    }
  </style>
</head>
<body>
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

  <?php
  // Include the header file   
  $activePage = 'donations'; 
  include 'includes/header.php';
  ?>

  <section class="donations__hero p-4">
    <div class="container-fluid text-center">
      <h1 class="hero__title">Donations</h1>
    </div>
  </section> 
  <div class="container py-5">
    <div class="row mb-4 gap-4 justify-content-center">
      <div class="col-lg-3  card green">
        <div class="card-icon">💰</div>
        <h2>Rp<?= number_format($total_donasi) ?></h2>
        <p>Total Donasi yang Terkumpul</p>
      </div>
        <div class="col-lg-3 card red">
        <div class="card-icon">❤️</div>
        <h2><?= $total_donatur ?></h2>
        <p>Donatur</p>
      </div>
        <div class="col-lg-3 card blue">
        <div class="card-icon">📅</div>
        <h2>Rp<?= number_format($avg_donasi) ?></h2>
        <p>Rata-rata Donasi</p>
    </div>

    <div class="card">
      <h3 class="mb-0" style="font-weight:bold"><i class="fas fa-heart text-danger"></i> Donasi</h3>
      <p class="text-muted mb-4">A heartfelt thank you to all our supporters who make our mission possible</p>
      <table class="table">
        <thead>
          <tr>
            <th><i class="fa fa-user"></i> Donatur</th>
            <th><i class="fa fa-dollar-sign"></i> Jumlah</th>
            <th><i class="fa fa-calendar"></i> Tanggal</th>
            <th><i class="fa fa-credit-card"></i> Metode</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result)): ?>
          <?php [$label, $color, $icon] = formatMetode($row['metode_donasi']); ?>
          <tr>
            <td><?= htmlspecialchars($row['nama_donatur']) ?></td>
            <td class="amount">Rp<?= number_format($row['nominal'], 2, ',', '.') ?></td>
            <td><?= date('F j, Y', strtotime($row['tanggal_donasi'])) ?></td>
            <td>
              <span class="badge bg-<?= $color ?> donation-method">
                <i class="fa <?= $icon ?>"></i> <?= $label ?>
              </span>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

<?php
include 'includes/footer.php';
?>

</body>
</html>