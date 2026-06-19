<?php
// File: PendaftaranReguler.php
require_once __DIR__ . '/../models/Pendaftaran.php';
class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor mencakup properti induk dan anak
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Implementasi metode abstrak dari induk
    public function hitungTotalBiaya() {
        // Misal: Jalur reguler dikenakan biaya penuh sesuai biaya dasar
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Reguler - Prodi: {$this->pilihanProdi}, Kampus: {$this->lokasiKampus}";
    }

    // Metode Query Spesifik untuk mengambil seluruh data Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
                  
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $listReguler = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Instansiasi objek PendaftaranReguler untuk setiap baris data
            $listReguler[] = new PendaftaranReguler(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }
        return $listReguler;
    }
}
?>