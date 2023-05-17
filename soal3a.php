<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Person, Hobi, dan Alamat</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 2px solid black;
            padding: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Pencarian Person, Hobi, dan Alamat</h2>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari berdasarkan Nama , Alamat dan Hobi...">
        <input type="submit" value="Search">
    </form>

    <table>
        <tr>
            <th>Nama</th>
            <th>Hobi</th>
            <th>Alamat</th>
        </tr>

        <?php
        // Informasi koneksi ke database
        $host = 'localhost';
        $dbname = 'testdb';
        $username = 'root';
        $password = '';

        try {
            // Membangun koneksi ke database menggunakan PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // Pengecekan apakah ada parameter search
            if (isset($_GET['search'])) {
                $search = $_GET['search'];

                // Menjalankan query SQL untuk mengambil data dengan kondisi pencarian
                $query = "SELECT *
                          FROM person as p
                          LEFT JOIN hobi as h ON p.id = h.person_id
                        --   LEFT JOIN alamat as a ON p.id = a.person_id
                          WHERE p.nama LIKE :search
                          OR alamat LIKE :search
                          OR hobi LIKE :search";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
                $stmt->execute();
            } else {
                // Menjalankan query SQL untuk mengambil data tanpa kondisi pencarian
                $query = "SELECT *
                          FROM person as p
                          LEFT JOIN hobi as h ON p.id = h.person_id";
                        // --   LEFT JOIN alamat a ON p.id = a.person_id";
                $stmt = $pdo->query($query);
            }
            if ($stmt->rowCount() > 0) {
                echo "<h3>Hasil Pencarian: $search </h3>";
                // echo "<ul>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // echo "<li>Nama: " . $row['nama'] . ", Alamat: " . $row['alamat'] . "</li>";
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['hobi'] . "</td>";
                    echo "</tr>";
                }
                // echo "</ul>";
            } else {
                echo "<p>Tidak ada hasil yang cocok dengan kata kunci pencarian Anda.</p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

    </table>
</body>
</html>
