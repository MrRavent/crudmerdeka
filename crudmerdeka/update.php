<!DOCTYPE html>
<html>
<head>
    <title>Update Makanan</title>
    <!-- Sisipkan file Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Makanan</h1>

        <?php
        // Periksa apakah parameter ID telah dikirimkan melalui URL
        if (isset($_GET['id'])) {
            $makananID = $_GET['id'];

            // Konfigurasi koneksi database
            $host = "localhost"; // Ganti dengan host MySQL Anda
            $username = "root"; // Ganti dengan username MySQL Anda
            $password = ""; // Ganti dengan password MySQL Anda
            $database = "makanan"; // Ganti dengan nama database Anda

            // Membuat koneksi ke database
            $koneksi = mysqli_connect($host, $username, $password, $database);

            // Periksa koneksi
            if (!$koneksi) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data makanan berdasarkan ID
            $query = "SELECT ID, NamaMakanan, Deskripsi, Harga
                      FROM Makanan
                      WHERE ID = $makananID";

            $result = mysqli_query($koneksi, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $dataMakanan = mysqli_fetch_assoc($result);
        ?>

        <form method="post" action="process_update.php">
            <input type="hidden" name="id" value="<?php echo $dataMakanan['ID']; ?>">
            <div class="form-group">
                <label for="namaMakanan">Nama Makanan:</label>
                <input type="text" class="form-control" id="namaMakanan" name="namaMakanan" value="<?php echo $dataMakanan['NamaMakanan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $dataMakanan['Deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $dataMakanan['Harga']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

        <?php
            } else {
                echo "Data makanan tidak ditemukan.";
            }

            mysqli_close($koneksi);
        } else {
            echo "ID makanan tidak valid.";
        }
        ?>

        <!-- Sisipkan tombol kembali ke halaman index.php -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <!-- Sisipkan file Bootstrap JavaScript (opsional, hanya jika Anda membutuhkan JavaScript) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
