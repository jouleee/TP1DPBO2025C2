<?php

// Mengimpor file Petshop.php yang berisi definisi kelas Petshop
require ('Petshop.php');

// Membuat beberapa objek Petshop dengan data awal
$pet1 = new Petshop("1", "Wishkas", "Makanan", "5000", "foto1.png");
$pet2 = new Petshop("2", "SikatUcing", "AlatPembersih", "10000", "foto2.png");
$pet3 = new Petshop("3", "PasirUcing", "AlatPipis", "5000", "foto3.png");

// Menyimpan objek ke dalam array daftar petshop
$datapetshop = [];
array_push($datapetshop, $pet1);
array_push($datapetshop, $pet2);
array_push($datapetshop, $pet3);

// Menampilkan daftar produk petshop dalam bentuk tabel HTML
echo "Menampilkan data produk petshop";
echo "<table border='2'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th>Kategori</th>";
echo "<th>Harga</th>";
echo "<th>Foto Produk</th>";
echo "</tr>";

// Loop untuk menampilkan setiap item dalam daftar petshop
foreach ($datapetshop as $item) {
    echo "<tr>";
    echo "<td>" . $item->getId() . "</td>";
    echo "<td>" . $item->getNama() . "</td>";
    echo "<td>" . $item->getKategori() . "</td>";
    echo "<td>" . $item->getHarga() . "</td>";
    echo "<td><img src='" . $item->getUrlFoto() . "' alt='Foto Produk' width='100' height='100'></td>";
    echo "</tr>";
}
echo "</table>";

// Menambahkan produk baru ke daftar petshop
$pet4 = new Petshop("4", "Omeo", "Makanan", "12000", "foto4.png");

// Mengubah nama dan harga dari produk baru sebelum ditambahkan
$pet4->setNama("Omeoooooo");
$pet4->setHarga("12999");

// Memasukkan produk baru yang sudah diubah ke dalam array
array_push($datapetshop, $pet4);

// Menampilkan daftar produk setelah penambahan dan perubahan data
echo "Menambah serta mengubah data produk petshop";
echo "<table border='2'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th>Kategori</th>";
echo "<th>Harga</th>";
echo "<th>Foto Produk</th>";
echo "</tr>";

// Loop untuk menampilkan data terbaru setelah penambahan produk baru
foreach ($datapetshop as $item) {
    echo "<tr>";
    echo "<td>" . $item->getId() . "</td>";
    echo "<td>" . $item->getNama() . "</td>";
    echo "<td>" . $item->getKategori() . "</td>";
    echo "<td>" . $item->getHarga() . "</td>";
    echo "<td><img src='" . $item->getUrlFoto() . "' alt='Foto Produk' width='100' height='100'></td>";
    echo "</tr>";
}
echo "</table>";

// Menghapus produk dengan ID "3" dari daftar petshop
foreach ($datapetshop as $key => $pet) {
    if ($pet->getId() == "3") {
        unset($datapetshop[$key]); // Menghapus elemen array berdasarkan kunci
    }
}

// Menampilkan daftar produk setelah penghapusan produk dengan ID "3"
echo "Menghapus data produk petshop";
echo "<table border='2'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th>Kategori</th>";
echo "<th>Harga</th>";
echo "<th>Foto Produk</th>";
echo "</tr>";

// Loop untuk menampilkan data terbaru setelah penghapusan
foreach ($datapetshop as $item) {
    echo "<tr>";
    echo "<td>" . $item->getId() . "</td>";
    echo "<td>" . $item->getNama() . "</td>";
    echo "<td>" . $item->getKategori() . "</td>";
    echo "<td>" . $item->getHarga() . "</td>";
    echo "<td><img src='" . $item->getUrlFoto() . "' alt='Foto Produk' width='100' height='100'></td>";
    echo "</tr>";
}
echo "</table>";

// Mencari produk berdasarkan nama
echo "Mencari berdasarkan nama <br>";
$found = false; // Variabel untuk menandai apakah data ditemukan atau tidak

foreach ($datapetshop as $item) {
    if ($item->getNama() == "Wishkas") {
        echo $item->getId() . "<br>";
        echo $item->getNama() . "<br>";
        echo $item->getKategori() . "<br>";
        echo $item->getHarga() . "<br>";
        echo "<img src='" . $item->getUrlFoto() . "' alt='Foto Produk' width='100' height='100'>";
        $found = true; // Menandai bahwa data telah ditemukan
        break; // Keluar dari loop setelah menemukan data
    }
}

// Jika tidak ditemukan, tampilkan pesan
if (!$found) {
    echo "Data tidak ditemukan <br>";
}

?>