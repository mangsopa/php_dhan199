<?php
// Menginisialisasi variabel dengan nilai awal kosong
$nama = "";
$umur = "";
$hobi = "";

// Cek apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai input dari formulir
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $hobi = $_POST["hobi"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Data</title>
</head>
<body>
    <h2>Formulir Data</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required value="<?php echo $nama; ?>"><br><br>

        <label for="umur">Umur:</label>
        <input type="text" id="umur" name="umur" required value="<?php echo $umur; ?>"><br><br>

        <label for="hobi">Hobi:</label>
        <input type="text" id="hobi" name="hobi" requiredvalue="<?php echo $hobi; ?>"><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Cek apakah formulir telah disubmit dan variabel nama tidak kosong
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($nama)) {
        echo "<h2>Data yang Diinput:</h2>";
        echo "Nama: " . $nama . "<br>";
        echo "Umur: " . $umur . "<br>";
        echo "Hobi: " . $hobi . "<br>";
    }
    ?>
</body>
</html>
