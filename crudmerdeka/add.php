<!DOCTYPE html>
<html>
<head>
    <title>Tambah Makanan</title>
    <!-- Sisipkan file Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Makanan</h1>
        <form method="post" action="add.php">
            <div class="form-group">
                <label for="namaMakanan">Nama Makanan:</label>
                <input type="text" class="form-control" id="namaMakanan" name="namaMakanan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Tangani penambahan data ke database di sini
            $namaMakanan = $_POST['namaMakanan'];
            $deskripsi = $_POST['deskripsi'];
            $harga = $_POST['harga'];
            // $kategori = $_POST['kategori']; // Hapus baris ini jika Anda tidak menggunakan kategori

            // Lakukan koneksi ke database dan tambah data
            // Misalnya, dengan mengirimkan query SQL INSERT
            $host = "localhost"; // Ganti dengan host MySQL Anda
            $username = "root"; // Ganti dengan username MySQL Anda
            $password = ""; // Ganti dengan password MySQL Anda
            $database = "makanan"; // Ganti dengan nama database Anda

            $koneksi = mysqli_connect($host, $username, $password, $database);

            if (!$koneksi) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            $query = "INSERT INTO Makanan (NamaMakanan, Deskripsi, Harga)
                      VALUES ('$namaMakanan', '$deskripsi', $harga)";

            if (mysqli_query($koneksi, $query)) {
                echo "<div class='alert alert-success'>Data makanan berhasil ditambahkan.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($koneksi) . "</div>";
            }

            mysqli_close($koneksi);
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