<?php
// File: PendaftaranKedinasan.php
require_once __DIR__ . '/../models/Pendaftaran.php';
class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Implementasi metode abstrak dari induk
    public function hitungTotalBiaya() {
        // Misal: Jalur kedinasan digratiskan (0) karena ditanggung sponsor
        return 0.00;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Kedinasan - Sponsor: {$this->instansiSponsor}, No SK: {$this->skIkatanDinas}";
    }

    // Metode Query Spesifik untuk mengambil seluruh data Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
                  
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $listKedinasan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $listKedinasan[] = new PendaftaranKedinasan(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }
        return $listKedinasan;
    }
}
?>