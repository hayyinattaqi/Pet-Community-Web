<?php
include_once 'config.php';
requireLogin(); // Pastikan user sudah login
?>

<?php
include_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
// Proses Tambah/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
$id = mysqli_real_escape_string($conn, $_POST['id_program'] ?? '');
$nama = mysqli_real_escape_string($conn, $_POST['nama_program']);
$mulai = mysqli_real_escape_string($conn, $_POST['tanggal_mulai']);
$selesai = mysqli_real_escape_string($conn, $_POST['tanggal_selesai']);
$desc = mysqli_real_escape_string($conn, $_POST['deskripsi']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$kategori = mysqli_real_escape_string($conn, $_POST['kategori_program']);
$id_PIC = mysqli_real_escape_string($conn, $_POST['id_PIC']);

if ($id == '') {
    $sql = "INSERT INTO programs (id_PIC, nama_program, tanggal_mulai, tanggal_selesai, deskripsi, status, kategori_program)
            VALUES ('$id_PIC', '$nama', '$mulai', '$selesai', '$desc', '$status', '$kategori')";
    $action = 'tambah';
} else {
    $sql = "UPDATE programs SET 
            id_PIC = '$id_PIC',
            nama_program = '$nama',
            tanggal_mulai = '$mulai',
            tanggal_selesai = '$selesai',
            deskripsi = '$desc',
            status = '$status',
            kategori_program = '$kategori'
            WHERE id_program = '$id'";
    $action = 'update';
}

mysqli_query($conn, $sql);
header("Location: dashboard.php?action=$action");
exit();
}

// Proses Hapus
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    mysqli_query($conn, "DELETE FROM programs WHERE id_program = '$id'");
    header("Location: dashboard.php?action=hapus");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f4f9ff;
    }
    .dashboard-card {
      max-width: 600px;
      margin: 80px auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      text-align: center;
      background: linear-gradient(to bottom, #e6f0ff, #d3e4ff);
    }
    .btn-logout {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="dashboard-card ">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['nama'] ?? $_SESSION['username']) ?> 👋</h2>    <p class="text-muted">You are now logged in to the dashboard.</p>
    
    <a href="logout.php" class="btn btn-danger btn-logout">Logout</a>
  </div>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Manajemen Program</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">Program Management</h2>

  <!-- Form Tambah/Edit -->
  <div class="card mb-4">
    <div class="card-header">Tambah / Edit Program</div>
    <div class="card-body">
      <form method="POST" action="">
        <input type="hidden" name="id_program" id="id_program">
        <div class="mb-2">
          <label class="form-label">Nama Program</label>
          <input type="text" name="nama_program" id="nama_program" class="form-control" required>
        </div>
        <div class="row">
          <div class="col">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
          </div>
          <div class="col">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
          </div>
        </div>
        <div class="mb-2 mt-2">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="2"></textarea>
        </div>
        <div class="row">
          <div class="col">
            <label class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
              <option value="draft">Draft</option>
              <option value="aktif">Aktif</option>
              <option value="selesai">Selesai</option>
              <option value="batal">Batal</option>
            </select>
          </div>
          <div class="col">
            <label class="form-label">Kategori</label>
            <select name="kategori_program" id="kategori_program" class="form-select">
              <option value="rescue">Rescue</option>
              <option value="medical">Medical</option>
              <option value="education">Education</option>
              <option value="feeding">Feeding</option>
            </select>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label">PIC</label>
          <select name="id_PIC" id="id_PIC" class="form-select">
            <?php
              $pic = $conn->query("SELECT * FROM pic");
              while ($p = $pic->fetch_assoc()):
            ?>
            <option value="<?= $p['id_PIC'] ?>"><?= $p['nama_PIC'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100" onclick="return confirmSubmit()">Simpan</button>
      </form>
    </div>
  </div>

  <!-- Tabel Program -->
  <div class="card">
    <div class="card-header">Data Program</div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $result = $conn->query("SELECT * FROM programs");
            while ($row = $result->fetch_assoc()):
          ?>
          <tr>
            <td><?= htmlspecialchars($row['nama_program']) ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['kategori_program'] ?></td>
            <td>
              <button class="btn btn-sm btn-warning" onclick='editForm(<?= json_encode($row) ?>)'>Edit</button>
              <a href="?delete=<?= $row['id_program'] ?>" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  function editForm(data) {
    document.getElementById('id_program').value = data.id_program;
    document.getElementById('nama_program').value = data.nama_program;
    document.getElementById('tanggal_mulai').value = data.tanggal_mulai;
    document.getElementById('tanggal_selesai').value = data.tanggal_selesai;
    document.getElementById('deskripsi').value = data.deskripsi;
    document.getElementById('status').value = data.status;
    document.getElementById('kategori_program').value = data.kategori_program;
    document.getElementById('id_PIC').value = data.id_PIC;
    window.scrollTo(0, 0);
  }

  function confirmSubmit() {
    return confirm("Apakah kamu yakin ingin menyimpan data ini?");
  }

  function confirmDelete() {
    return confirm("Yakin ingin menghapus data ini?");
  }

  // Notifikasi SweetAlert berdasarkan URL parameter
  const params = new URLSearchParams(window.location.search);
  if (params.has('action')) {
    const act = params.get('action');
    let msg = '';
    if (act === 'tambah') msg = 'Data berhasil ditambahkan!';
    if (act === 'update') msg = 'Data berhasil diupdate!';
    if (act === 'hapus') msg = 'Data berhasil dihapus!';
    if (msg) {
      Swal.fire({
        icon: 'success',
        title: msg,
        showConfirmButton: false,
        timer: 2000
      });
    }
  }
</script>
</body>
</html>
