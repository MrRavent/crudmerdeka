<!DOCTYPE html>
<html>
<head>
    <title>Daftar Makanan</title>
    <!-- Sisipkan file Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Makanan</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
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
</body>
</html>