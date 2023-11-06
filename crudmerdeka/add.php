<!DOCTYPE html>
<html>

<head>
    <title>Tambah Makanan</title>
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
            $namaMakanan = $_POST['namaMakanan'];
            $deskripsi = $_POST['deskripsi'];
            $harga = $_POST['harga'];
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "makanan";

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

        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sukses!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Data makanan berhasil ditambahkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
// JavaScript untuk menampilkan pesan sukses atau kesalahan dan modal pop-up
$(document).ready(function() {
    const addForm = document.getElementById('addForm');
    const alertContainer = document.getElementById('alertContainer');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));

    addForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(addForm);

        // Simulasi pengiriman data dengan delay
        setTimeout(function() {
            const randomSuccess = Math.random() < 0.5; // Simulasi kesuksesan acak
            if (randomSuccess) {
                alertContainer.innerHTML = '<div class="alert alert-success">Data makanan berhasil ditambahkan.</div>';
                addForm.reset();
                successModal.show(); // Tampilkan modal pop-up sukses
            } else {
                alertContainer.innerHTML = '<div class="alert alert-danger">Terjadi kesalahan saat menambahkan data makanan.</div>';
            }
        }, 1000); // Delay 1 detik (digunakan untuk simulasi)

        // Hapus pesan setelah beberapa detik
        setTimeout(function() {
            alertContainer.innerHTML = '';
        }, 5000); // Hapus pesan setelah 5 detik
    });
});
</script>

</body>

</html>