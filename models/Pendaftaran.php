<?php
// File: Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected agar bisa diakses oleh class anak/subclass)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Mapping dari biaya_pendaftaran_dasar di DB

    // Constructor untuk memetakan data dari database ke properti objek
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $sekolah;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // --- Getter dan Setter (Opsional, untuk mendukung enkapsulasi yang baik) ---
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // --- Metode Abstrak (Wajib di-override/diimplementasikan di class anak) ---
    
    /**
     * Menghitung total biaya pendaftaran berdasarkan formula spesifik masing-masing jalur.
     * @return float
     */
    abstract public function hitungTotalBiaya();

    /**
     * Menampilkan informasi spesifik mengenai jalur pendaftaran yang dipilih.
     * @return string
     */
    abstract public function tampilkanInfoJalur();
}
?>