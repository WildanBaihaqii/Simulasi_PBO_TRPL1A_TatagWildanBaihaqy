<?php
// File: index.php

// 1. Muat berkas koneksi dan kelas objek
require_once 'control/Koneksi.php';
require_once 'models/Pendaftaran.php';
require_once 'class/PendaftaranReguler.php';
require_once 'class/PendaftaranPrestasi.php';
require_once 'class/PendaftaranKedinasan.php';

// 2. Dapatkan koneksi database PDO
$db = Koneksi::getConnection();

// 3. Ambil data dari masing-masing jalur
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

// Total statistik ringkas
$totalReguler   = count($dataReguler);
$totalPrestasi  = count($dataPrestasi);
$totalKedinasan = count($dataKedinasan);
$totalSemua     = $totalReguler + $totalPrestasi + $totalKedinasan;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran PBO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Table Pendaftaran</span>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-item active" onclick="switchTab('all', this)">
                <i class="fa-solid fa-chart-pie"></i> Semua Data
            </li>
            <li class="menu-item" onclick="switchTab('reguler', this)">
                <i class="fa-solid fa-user-graduate"></i> Jalur Reguler
            </li>
            <li class="menu-item" onclick="switchTab('prestasi', this)">
                <i class="fa-solid fa-award"></i> Jalur Prestasi
            </li>
            <li class="menu-item" onclick="switchTab('kedinasan', this)">
                <i class="fa-solid fa-building-shield"></i> Jalur Kedinasan
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard Pendaftaran PMB</h1>
            <p>Aplikasi Simulasi berbasis Objek Kelas TRPL 1A • <strong>Tatag Wildan Baihaqy</strong></p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info"><h3>Total Pendaftar</h3><p><?= $totalSemua ?></p></div>
                <div class="stat-icon bg-blue"><i class="fa-solid fa-users"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info"><h3>Jalur Reguler</h3><p><?= $totalReguler ?></p></div>
                <div class="stat-icon bg-green"><i class="fa-solid fa-user-graduate"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info"><h3>Jalur Prestasi</h3><p><?= $totalPrestasi ?></p></div>
                <div class="stat-icon bg-purple"><i class="fa-solid fa-award"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info"><h3>Jalur Kedinasan</h3><p><?= $totalKedinasan ?></p></div>
                <div class="stat-icon bg-amber"><i class="fa-solid fa-building-shield"></i></div>
            </div>
        </div>

        <div id="panel-all" class="section-panel active">
            <div class="section-title"><i class="fa-solid fa-list"></i> Seluruh Pendaftar</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama Calon</th><th>Asal Sekolah</th><th>Nilai</th><th>Jalur</th><th>Biaya Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $semua = array_merge($dataReguler, $dataPrestasi, $dataKedinasan);
                        usort($semua, function($a, $b) { return $a->getIdPendaftaran() <=> $b->getIdPendaftaran(); });
                        foreach ($semua as $mhs): 
                            $class = strtolower(str_replace('Pendaftaran', '', get_class($mhs)));
                        ?>
                        <tr>
                            <td><?= $mhs->getIdPendaftaran() ?></td>
                            <td><strong><?= $mhs->getNamaCalon() ?></strong></td>
                            <td><?= $mhs->getAsalSekolah() ?></td>
                            <td><?= $mhs->getNilaiUjian() ?></td>
                            <td><span class="badge badge-<?= $class ?>"><?= ucfirst($class) ?></span></td>
                            <td><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></strong></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="panel-reguler" class="section-panel">
            <div class="section-title"><i class="fa-solid fa-user-graduate"></i> Detail Data Jalur Reguler</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama</th><th>Asal Sekolah</th><th>Nilai</th><th>Informasi Tambahan</th><th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataReguler as $mhs): ?>
                        <tr>
                            <td><?= $mhs->getIdPendaftaran() ?></td>
                            <td><strong><?= $mhs->getNamaCalon() ?></strong></td>
                            <td><?= $mhs->getAsalSekolah() ?></td>
                            <td><?= $mhs->getNilaiUjian() ?></td>
                            <td><?= $mhs->tampilkanInfoJalur() ?></td>
                            <td>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="panel-prestasi" class="section-panel">
            <div class="section-title"><i class="fa-solid fa-award"></i> Detail Data Jalur Prestasi (Potongan 50%)</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama</th><th>Asal Sekolah</th><th>Nilai</th><th>Informasi Tambahan</th><th>Biaya Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPrestasi as $mhs): ?>
                        <tr>
                            <td><?= $mhs->getIdPendaftaran() ?></td>
                            <td><strong><?= $mhs->getNamaCalon() ?></strong></td>
                            <td><?= $mhs->getAsalSekolah() ?></td>
                            <td><?= $mhs->getNilaiUjian() ?></td>
                            <td><?= $mhs->tampilkanInfoJalur() ?></td>
                            <td><span style="color: #22c55e; font-weight: 600;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="panel-kedinasan" class="section-panel">
            <div class="section-title"><i class="fa-solid fa-building-shield"></i> Detail Data Jalur Kedinasan (Sponsorship)</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama</th><th>Asal Sekolah</th><th>Nilai</th><th>Informasi Tambahan</th><th>Biaya Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataKedinasan as $mhs): ?>
                        <tr>
                            <td><?= $mhs->getIdPendaftaran() ?></td>
                            <td><strong><?= $mhs->getNamaCalon() ?></strong></td>
                            <td><?= $mhs->getAsalSekolah() ?></td>
                            <td><?= $mhs->getNilaiUjian() ?></td>
                            <td><?= $mhs->tampilkanInfoJalur() ?></td>
                            <td><span class="badge badge-prestasi">Gratis / Full Beasiswa</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName, element) {
            document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
            element.classList.add('active');

            document.querySelectorAll('.section-panel').forEach(panel => panel.classList.remove('active'));
            document.getElementById('panel-' + tabName).classList.add('active');
        }
    </script>
</body>
</html>