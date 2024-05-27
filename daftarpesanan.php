<?php 

// Membuat tanda bahwa ini adalah halaman Pendaftaran Daftar Pesanan
$title = "Daftar Pesanan";

// Menggabungkan file config dan _header
include "config.php";
include "_header.php";

// Ambil semua data pemesanan
$query = mysqli_query($conn, "SELECT * FROM pemesanan");

// Cek apakah ada data yang di post dengan name hapus
if (isset($_POST['hapus'])) {

    // Tampung data id
    $id = $_POST['id'];

    // Buat query untuk menghapus data
    $query = mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");

    // Cek proses query
    if ($query) {
        header('Location: daftarpesanan.php?success=Data+pemesanan+berhasil+dihapus!');
    }
}

?>

<div class="container">
    <h2 class="mb-3">Daftar Pesanan</h2>

    <!-- Cek apakah ada data di parameter dengan name success -->
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_GET['success'] ?>
        </div>
    <?php } ?>

    <div class="table-responsive">
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No. </th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. HP / Telp</th>
                    <th scope="col">Tanggal Pesanan</th>
                    <th scope="col" class="text-center">Jumlah Hari</th>
                    <th scope="col" class="text-center">Jumlah Peserta</th>
                    <th scope="col">Harga Paket</th>
                    <th scope="col">Total Tagihan</th>
                    <?php if ($_SESSION['role'] == 0) { ?>
                        <th scope="col" class="text-center">Aksi</th>
                    <?php } ?>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Buat variable untuk penomoran
                    $no = 1;

                    // Tampilkan data menggunakan perulangan foreach
                    foreach($query as $data) { 
                ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $data['nama_pemesan'] ?></td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?= $data['tanggal_pemesanan'] ?></td>
                    <td class="text-center"><?= $data['durasi_perjalanan'] ?></td>
                    <td class="text-center"><?= $data['jumlah_peserta'] ?></td>
                    <td><?= number_format($data['harga_paket'], 0, '.', ',') ?></td>
                    <td><?= number_format($data['jumlah_tagihan'], 0, '.', ',') ?></td>
                    <?php if ($_SESSION['role'] == 0) { ?>
                        <td class="text-center">
                        <div class="d-flex">
                            <a href="ubahpesanan.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-primary me-2">Ubah</a>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ingin hapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                    <?php } ?>
                   
                </tr>
                <!-- Jika tidak ada data di database -->
                <?php } if (mysqli_num_rows($query) == 0) { ?>
                    <tr>
                        <td colspan="12" class="text-center">Tidak ada data yang dapat ditampilkan</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php 

include "_footer.php";

?>