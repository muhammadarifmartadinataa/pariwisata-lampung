<?php 

// Membuat tanda bahwa ini adalah halaman Edit Data Pesanan
$title = "Edit Data Pesanan";

// Menggabungkan file config dan _header
include "config.php";
include "_header.php";

// Menampung data id dari parameter
$id = $_GET['id'];

// Mencari data pemesanan yang sesuai dengan id di atas
$data = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id = $id");

// Memecah data agar bisa di akses secara langsung
$row = mysqli_fetch_assoc($data);

// Cek apakah ada data yang di post dan memiliki name edit
if (isset($_POST['edit'])) {

    // Tampung semua data yang di post ke dalam variable
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $penginapan = !empty($_POST['penginapan']) ? 1 : 0;
    $transportasi = !empty($_POST['transportasi']) ? 1 : 0;
    $makanan = !empty($_POST['makanan']) ? 1 : 0;
    $harga = $_POST['harga'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    // Buat query untuk mengupdate data
    $query = mysqli_query($conn, "UPDATE pemesanan SET 
        nama_pemesan = '$nama', 
        no_hp = '$nohp', 
        tanggal_pemesanan = '$tanggal', 
        durasi_perjalanan = $durasi, 
        jumlah_peserta = $jumlah_orang, 
        penginapan = $penginapan, 
        transportasi = $transportasi, 
        makanan = $makanan, 
        harga_paket = $harga, 
        jumlah_tagihan = $jumlah_tagihan 
        WHERE id = $id"
    );

    // Cek proses query
    if ($query) {
        header('Location: daftarpesanan.php?success=Data+pemesanan+berhasil+diubah');
    }
}

?>

<div class="container">
    <div class="row mb-4">
        <div class="col-lg-9">
            <h2 class="mb-3">Edit Data Pemesanan</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama" value="<?= $row['nama_pemesan'] ?>" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">No. HP / Telp</label>
                        <input type="text" class="form-control" name="nohp" value="<?= $row['no_hp'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $row['tanggal_pemesanan'] ?>" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Durasi Perjalanan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="durasi" value="<?= $row['durasi_perjalanan'] ?>" id="durasi" required>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Jumlah Peserta</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="jumlah_orang" value="<?= $row['jumlah_peserta'] ?>" id="jumlah_peserta" required>
                            <span class="input-group-text">orang</span>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <label class="form-label">Pelayanan Paket Perjalanan</label>
                        <div class="row mx-0">
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="penginapan" <?= $row['penginapan'] ? 'checked' : '' ?> id="penginapan">
                                <label class="form-check-label" for="penginapan">Penginapan (Rp 1.000.000)</label>
                            </div>
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="transportasi" <?= $row['transportasi'] ? 'checked' : '' ?> id="transportasi">
                                <label class="form-check-label" for="transportasi">Transportasi (Rp 1.200.000)</label>
                            </div>
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="makanan" <?= $row['makanan'] ? 'checked' : '' ?> id="makanan">
                                <label class="form-check-label" for="makanan">Makanan (Rp 500.000)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Harga Paket</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $row['harga_paket'] ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Jumlah Tagihan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="jumlah" name="jumlah_tagihan" value="<?= $row['jumlah_tagihan'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <button type="submit" name="edit" class="btn btn-primary me-2">Update</button>
                    <button type="button" class="btn btn-success me-2" id="btn-hitung">Hitung</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">Paket Wisata 1</h5>
                    <iframe width="100%" class="rounded" height="150" src="https://www.youtube.com/embed/wxx9KaO5rJ4?si=SbRJxDHcZ0E0hp0N" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Paket Wisata 2</h5>
                    <iframe width="100%" class="rounded" height="150" src="https://www.youtube.com/embed/AOZmivT6cNw?si=Zxyrwd3sPSZGo66x" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/script.js"></script>

<?php 

include "_footer.php";

?>