<?php
require_once('Petshop.php'); // Pastikan class Petshop dimuat dulu
session_start();

// Inisialisasi daftar petshop di session jika belum ada
if (!isset($_SESSION['datapetshop']) || !is_array($_SESSION['datapetshop'])) {
    $_SESSION['datapetshop'] = [];
}

// Pastikan setiap item dalam session benar-benar dalam bentuk objek Petshop
$datapetshop = array_map(function ($item) {
    return ($item instanceof Petshop) ? $item : unserialize($item);
}, $_SESSION['datapetshop']);

// Tambah produk baru
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $id = count($datapetshop) + 1;
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $urlFoto = $_POST['urlFoto'];

    $pet = new Petshop($id, $nama, $kategori, $harga, $urlFoto);
    $_SESSION['datapetshop'][] = $pet; // Simpan objek langsung tanpa serialize
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect untuk mencegah re-submit form
    exit();
}

// Edit produk
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $idEdit = $_POST['idEdit'];
    foreach ($datapetshop as $key => $pet) {
        if ($pet->getId() == $idEdit) {
            $pet->setNama($_POST['nama']);
            $pet->setKategori($_POST['kategori']);
            $pet->setHarga($_POST['harga']);
            $pet->setUrlFoto($_POST['urlFoto']);
            $_SESSION['datapetshop'][$key] = $pet; // Simpan perubahan
        }
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Hapus produk berdasarkan ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $idHapus = $_POST['idHapus'];
    foreach ($datapetshop as $key => $pet) {
        if ($pet->getId() == $idHapus) {
            unset($_SESSION['datapetshop'][$key]);
        }
    }
    $_SESSION['datapetshop'] = array_values($_SESSION['datapetshop']); // Reindex array
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Cari produk berdasarkan nama
$cariNama = isset($_POST['cariNama']) ? $_POST['cariNama'] : "";
$hasilCari = [];

if (!empty($cariNama)) {
    foreach ($_SESSION['datapetshop'] as $item) {
        if ($item->getNama() == $cariNama) {
            $hasilCari[] = $item;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

    <h2>Tambah Produk Petshop</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required>
        Kategori: <input type="text" name="kategori" required>
        Harga: <input type="number" name="harga" required>
        Foto URL: <input type="text" name="urlFoto" required>
        <button type="submit" name="add">Tambah</button>
    </form>

    <h2>Daftar Produk Petshop</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($datapetshop as $item): ?>
        <tr>
            <td><?= $item->getId(); ?></td>
            <td><?= $item->getNama(); ?></td>
            <td><?= $item->getKategori(); ?></td>
            <td><?= $item->getHarga(); ?></td>
            <td><img src="<?= $item->getUrlFoto(); ?>" width="100"></td>
            <td>
                <!-- Tombol Edit -->
                <button onclick="editForm(<?= $item->getId(); ?>, '<?= $item->getNama(); ?>', '<?= $item->getKategori(); ?>', <?= $item->getHarga(); ?>, '<?= $item->getUrlFoto(); ?>')">
                    Edit
                </button>

                <!-- Form Hapus -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="idHapus" value="<?= $item->getId(); ?>">
                    <button type="submit" name="delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form Edit Produk -->
    <h2>Edit Produk Petshop</h2>
    <form method="POST" id="editForm">
        <input type="hidden" name="idEdit" id="idEdit">
        Nama: <input type="text" name="nama" id="editNama" required>
        Kategori: <input type="text" name="kategori" id="editKategori" required>
        Harga: <input type="number" name="harga" id="editHarga" required>
        Foto URL: <input type="text" name="urlFoto" id="editFoto" required>
        <button type="submit" name="edit">Simpan Perubahan</button>
    </form>

    <script>
        function editForm(id, nama, kategori, harga, urlFoto) {
            document.getElementById('idEdit').value = id;
            document.getElementById('editNama').value = nama;
            document.getElementById('editKategori').value = kategori;
            document.getElementById('editHarga').value = harga;
            document.getElementById('editFoto').value = urlFoto;
        }
    </script>

<h2>Cari Produk</h2>
    <form method="POST">
        Nama: <input type="text" name="cariNama">
        <button type="submit">Cari</button>
    </form>

    <?php if (!empty($cariNama)): ?>
        <h3>Hasil Pencarian:</h3>
        <?php if (count($hasilCari) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto Produk</th>
                </tr>
                <?php foreach ($hasilCari as $item): ?>
                <tr>
                    <td><?= $item->getId(); ?></td>
                    <td><?= $item->getNama(); ?></td>
                    <td><?= $item->getKategori(); ?></td>
                    <td><?= $item->getHarga(); ?></td>
                    <td><img src="<?= $item->getUrlFoto(); ?>" width="100"></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Produk tidak ditemukan.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
