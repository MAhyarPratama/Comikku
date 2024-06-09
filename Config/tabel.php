<?php
// Koneksi ke database (ganti nilainya sesuai dengan informasi database Anda)
$host = "localhost"; // Hostname
$username = "username"; // Username database
$password = "password"; // Password database
$database = "nama_database"; // Nama database

// Buat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data komik dari tabel Comics
$sql = "SELECT * FROM Comics";
$result = $conn->query($sql);

// Membuat tabel HTML untuk menampilkan data komik
echo "<table border='1'>
<tr>
<th>Title</th>
<th>Author</th>
<th>Genre</th>
<th>Description</th>
<th>Publish Date</th>
</tr>";

// Mengambil dan menampilkan data komik satu per satu
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Author'] . "</td>";
        echo "<td>" . $row['Genre'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "<td>" . $row['PublishDate'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data komik.</td></tr>";
}
echo "</table>";

// Menutup koneksi database
$conn->close();
?>
