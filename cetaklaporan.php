<?php 
require_once("koneksi.php");
session_start();

// Memastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

// Ambil username dari sesi
$username = $_SESSION['username'];  

// Menangani error jika ada
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cetak Laporan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theme.css">

    <!-- FontAwesome -->
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        @media print {
            .no-print {
                display: none; /* Tombol tidak muncul di cetak */
            }
        }
    </style>

    <!-- Otomatis Memanggil window.print() saat halaman dimuat -->
    <script>
        window.onload = function() {
            window.print(); // Memanggil dialog print saat halaman selesai dimuat
        }
    </script>
</head>
<body>

<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h2>Data Absen</h2>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Waktu</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Query untuk mengambil data absensi
                        $sql = "SELECT * FROM tb_absen";
                        $query = mysqli_query($koneksi, $sql);
                        $no = 1;

                        // Loop untuk menampilkan data absensi
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['id_karyawan']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                <td><?php echo htmlspecialchars($row['waktu']); ?></td>
                         
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
