<!DOCTYPE html>
<html>

<head>
    <title>Daftar Makanan</title>
    <!-- Sisipkan file Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Daftar Makanan</h1>
        <a href="add.php" class="btn btn-primary">Add</a>
        <br><br>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "makanan";

        $koneksi = mysqli_connect($host, $username, $password, $database);

        if (!$koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $query = "SELECT m.ID, m.NamaMakanan, m.Deskripsi, m.Harga
                  FROM Makanan m";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<table id='makananTable' class='table table-striped'>
                <thead>
                    <tr>
                        <th data-sortable='true'>ID</th>
                        <th data-sortable='true'>Nama Makanan</th>
                        <th data-sortable='true'>Deskripsi</th>
                        <th data-sortable='true'>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['NamaMakanan'] . "</td>";
                echo "<td>" . $row['Deskripsi'] . "</td>";
                echo "<td>Rp " . number_format($row['Harga'], 0, ',', '.') . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row['ID'] . "' class='btn btn-success'>Update</a>
                        <a href='delete.php?id=" . $row['ID'] . "' class='btn btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody></table>";

            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        mysqli_close($koneksi);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Sisipkan JavaScript tambahan untuk mempercantik tampilan -->
    <script>
        $(document).ready(function() {
            // Menambahkan kelas "table-bordered" untuk memberi tabel border
            $('#makananTable').addClass('table-bordered');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#makananTable').addClass('table-bordered');

            // Fungsi konfirmasi saat tombol "Delete" diklik
            $('.btn-danger').click(function() {
                return confirm('Apakah Anda yakin ingin menghapus item ini?');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#makananTable').addClass('table-bordered');

            // Fungsi hover efek untuk baris tabel
            $('#makananTable tbody tr').hover(
                function() {
                    $(this).addClass('table-info');
                },
                function() {
                    $(this).removeClass('table-info');
                }
            );
        });
    </script>
    <script>
$(document).ready(function() {
    $('#makananTable').addClass('table-bordered');

    // Inisialisasi DataTables untuk fungsi pencarian
    $('#makananTable').DataTable();
});

</script>
<script>
    $(document).ready(function() {
        $('#makananTable').addClass('table-bordered');

        // Inisialisasi DataTables untuk fungsi pencarian dan sorting
        $('#makananTable').DataTable({
            "order": [] // Parameter ini akan mengaktifkan sorting pada semua kolom
        });
    });
</script>

</body>

</html>