const btnHitung = document.getElementById('btn-hitung');
const inputHarga = document.getElementById('harga');
const inputJumlahTagihan = document.getElementById('jumlah');
const inputDurasi = document.getElementById('durasi');
const inputJumlahPeserta = document.getElementById('jumlah_peserta');
const cbPenginapan = document.getElementById('penginapan');
const cbTransportasi = document.getElementById('transportasi');
const cbMakanan = document.getElementById('makanan');

// Buat data global untuk menampung harga paket
let penginapan = 0;
let transportasi = 0;
let makanan = 0;

// Fungsi untuk cek apakah paket terceklis atau tidak sekaligus memberikan harga
function cekHargaPaket() {
    penginapan = cbPenginapan.checked ? 1000000 : 0;
    transportasi = cbTransportasi.checked ? 1200000 : 0;
    makanan = cbMakanan.checked ? 500000 : 0;
}

// Fungsi untuk menghitung total harga
function hitungHarga() {
    return penginapan + transportasi + makanan;
}

// Fungsi untuk menghitung jumlah tagihan
function hitungJumlahTagihan() {
    return hitungHarga() * Number(inputDurasi.value) * Number(inputJumlahPeserta.value);
}

// Event ketika tombol hitung di klik
btnHitung.addEventListener('click', function() {
    cekHargaPaket();
    
    const totalHarga = hitungHarga();
    const totalTagihan = hitungJumlahTagihan();

    inputHarga.value = totalHarga;
    inputJumlahTagihan.value = totalTagihan;
});
