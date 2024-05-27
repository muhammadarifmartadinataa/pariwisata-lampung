<?php

// Membuat tanda bahwa ini adalah halaman Pendaftaran Paket Wisata
$title = "Pendaftaran Paket Wisata";

// Menggabungkan file config dan _header
include "config.php";
include "_header.php";

// Cek jika ada data yang dipost dan mempunyai nama tambah
if (isset($_POST['tambah'])) {

    // Tampung semua data yang di post ke masing - masing variable
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

    // Membuat query untuk menambahkan data ke database
    $query = mysqli_query($conn, "INSERT INTO pemesanan(
        nama_pemesan, 
        no_hp, 
        tanggal_pemesanan, 
        durasi_perjalanan, 
        jumlah_peserta, 
        penginapan, 
        transportasi, 
        makanan, 
        harga_paket, 
        jumlah_tagihan) 
        VALUES('$nama', '$nohp', '$tanggal', $durasi, $jumlah_orang, $penginapan, $transportasi, $makanan, $harga, $jumlah_tagihan)");

    // Cek apakah proses query berhasil
    if ($query) {
        // Arahkan ke halaman daftar pesanan dan buat parameter success
        header('Location: daftarpesanan.php?success=Data+pemesanan+berhasil+disimpan');
    }
}

?>

<div class="container">
    <div class="row mb-4">
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
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">Paket Wisata 3  </h5>
                    <iframe width="100%" class="rounded" height="150" src="https://www.youtube.com/embed/AOZmivT6cNw?si=Zxyrwd3sPSZGo66x" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h2 class="mb-3">Form Pemesanan Paket Wisata</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8 mb-3">
                        <label class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <label class="form-label">No. HP / Telp</label>
                        <input type="text" class="form-control" name="nohp" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Durasi Perjalanan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="durasi" value="0" id="durasi" required>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-3">
                        <label class="form-label">Jumlah Peserta</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="jumlah_orang" value="0" id="jumlah_peserta" required>
                            <span class="input-group-text">orang</span>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <label class="form-label">Pelayanan Paket Perjalanan</label>
                        <div class="row mx-0">
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="penginapan" id="penginapan">
                                <label class="form-check-label" for="penginapan">Penginapan (Rp 1.000.000)</label>
                            </div>
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="transportasi" id="transportasi">
                                <label class="form-check-label" for="transportasi">Transportasi (Rp 1.200.000)</label>
                            </div>
                            <div class="col-lg-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="makanan" id="makanan">
                                <label class="form-check-label" for="makanan">Makanan (Rp 500.000)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Harga Paket</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Jumlah Tagihan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="jumlah" name="jumlah_tagihan" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <button type="submit" name="tambah" class="btn btn-primary me-2">Simpan</button>
                    <button type="button" class="btn btn-success me-2" id="btn-hitung">Hitung</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
        
    </div>
</div>

<script src="assets/js/script.js"></script>

<?php

include "_footer.php";

?>