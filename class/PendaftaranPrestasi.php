<?php
// File: PendaftaranPrestasi.php
require_once __DIR__ . '/../models/Pendaftaran.php';
class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Implementasi metode abstrak dari induk
    public function hitungTotalBiaya() {
        // Misal: Jalur prestasi mendapatkan potongan 50% dari biaya dasar
        return $this->biayaPendaftaranDasar * 0.5;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Prestasi - Jenis: {$this->jenisPrestasi} ({$this->tingkatPrestasi})";
    }

    // Metode Query Spesifik untuk mengambil seluruh data Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
                  
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $listPrestasi = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listPrestasi[] = new PendaftaranPrestasi(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }
        return $listPrestasi;
    }
}
?>