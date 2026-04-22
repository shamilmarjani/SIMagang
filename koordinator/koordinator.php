<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Koordinator Bidang - SIMM</title>
    <meta name="description"
        content="Dashboard koordinator bidang untuk sistem manajemen magang JTI - monitoring kelompok, verifikasi, dan plotting.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/koordinator.css">
</head>

<body>
    <div class="dashboard-layout">

        <!-- Sidebar -->
        <aside class="sidebar">
            <a class="logo-container">
                <div class="logo-icons">
                    <div class="logo-icon y"></div>
                    <div class="logo-icon b"></div>
                    <div class="logo-icon c"></div>
                </div>
                <div class="logo-text-inner">
                    <span class="logo-text-jti">JTI</span>
                    <span class="logo-text-desc">JURUSAN<br>TEKNOLOGI<br>INFORMASI</span>
                </div>
            </a>

            <nav class="sidebar-nav">
                <a href="koordinator.php" class="nav-item active" id="nav-dashboard">Dashbord</a>

                <!-- Verifikasi dengan submenu -->
                <div class="nav-group" id="nav-verifikasi-group">
                    <div class="nav-item nav-parent" id="nav-verifikasi-toggle" onclick="toggleVerifikasi()">
                        <span>Verifikasi</span>
                        <span class="nav-arrow" id="verifikasi-arrow">&#x276F;</span>
                    </div>
                    <div class="nav-submenu" id="verifikasi-submenu">
                        <a href="#" class="nav-subitem" onclick="showPage('verifikasi-lokasi')">Lokasi Magang</a>
                        <a href="#" class="nav-subitem" onclick="showPage('verifikasi-proposal')">Proposal</a>
                        <a href="#" class="nav-subitem" onclick="showPage('verifikasi-berkas')">Berkas</a>
                    </div>
                </div>

                <a href="#" class="nav-item" id="nav-plotting" onclick="showPage('plotting')">Plotting</a>
            </nav>

            <div class="sidebar-footer">
                <a href="../auth/login.php" class="nav-item logout-btn">Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">

            <!-- PAGE: Dashboard -->
            <div id="page-dashboard" class="page active">

                <!-- Welcome Card -->
                <div class="welcome-card">
                    <img src="../assets/profile.png" alt="Profile Koordinator" class="profile-img">
                    <div class="welcome-text">
                        <h2>Selamat datang, Pak Sultan</h2>
                        <p>Koordinator Bidang &ndash; Teknik Komputer</p>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="stat-grid">
                    <div class="stat-card" onclick="showPage('dashboard')">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Kelompok Aktif</div>
                    </div>
                    <div class="stat-card" onclick="showPage('verifikasi-lokasi')">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Verifikasi Lokasi</div>
                    </div>
                    <div class="stat-card" onclick="showPage('verifikasi-proposal')">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Verifikasi Proposal</div>
                    </div>
                    <div class="stat-card" onclick="showPage('verifikasi-berkas')">
                        <div class="stat-number">2</div>
                        <div class="stat-label">Verifikasi Berkas</div>
                    </div>
                </div>

                <!-- Tabel Daftar Kelompok -->
                <div class="card">
                    <div class="card-header-plain">
                        <h3>Daftar Kelompok Perlu Verifikasi</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table" id="tabel-kelompok">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Ketua</th>
                                    <th>Jumlah Anggota</th>
                                    <th>Jenis Verifikasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Tegar</td>
                                    <td>5</td>
                                    <td>Proposal</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td><button class="btn-verifikasi"
                                            onclick="bukaVerifikasi(this)">Verifikasi</button></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Ali</td>
                                    <td>4</td>
                                    <td>Info Kelompok</td>
                                    <td><span class="badge badge-info-status">Diperiksa</span></td>
                                    <td><button class="btn-verifikasi"
                                            onclick="bukaVerifikasi(this)">Verifikasi</button></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Aldi</td>
                                    <td>5</td>
                                    <td>Anggota</td>
                                    <td><span class="badge badge-danger">Gagal</span></td>
                                    <td><button class="btn-verifikasi"
                                            onclick="bukaVerifikasi(this)">Verifikasi</button></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Alfi</td>
                                    <td>5</td>
                                    <td>Proposal</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td><button class="btn-verifikasi"
                                            onclick="bukaVerifikasi(this)">Verifikasi</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- end page-dashboard -->

            <!-- PAGE: Verifikasi Lokasi -->
            <div id="page-verifikasi-lokasi" class="page">
                <div class="page-title-bar">
                    <h1>Verifikasi Lokasi Magang</h1>
                    <span class="page-subtitle">Periksa dan setujui lokasi magang yang diajukan kelompok</span>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Ketua</th>
                                    <th>Lokasi Magang</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tim Alpha</td>
                                    <td>Tegar</td>
                                    <td>PT. Telkom Indonesia</td>
                                    <td>20 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Beta</td>
                                    <td>Rina</td>
                                    <td>CV. Nusantara Tech</td>
                                    <td>19 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Gamma</td>
                                    <td>Budi</td>
                                    <td>PT. XYZ Solusi Digital</td>
                                    <td>18 Apr 2026</td>
                                    <td><span class="badge badge-success-status">Disetujui</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" disabled>Setuju</button>
                                        <button class="btn-tolak" disabled>Tolak</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end page-verifikasi-lokasi -->

            <!-- PAGE: Verifikasi Proposal -->
            <div id="page-verifikasi-proposal" class="page">
                <div class="page-title-bar">
                    <h1>Verifikasi Proposal</h1>
                    <span class="page-subtitle">Periksa proposal magang yang diajukan oleh setiap kelompok</span>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Ketua</th>
                                    <th>File Proposal</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Tegar</td>
                                    <td><a href="#" class="link-file">proposal_alpha.pdf</a></td>
                                    <td>20 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Alfi</td>
                                    <td><a href="#" class="link-file">proposal_beta.pdf</a></td>
                                    <td>21 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Sari</td>
                                    <td><a href="#" class="link-file">proposal_gamma.pdf</a></td>
                                    <td>19 Apr 2026</td>
                                    <td><span class="badge badge-danger">Ditolak</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Aldi</td>
                                    <td><a href="#" class="link-file">proposal_delta.pdf</a></td>
                                    <td>17 Apr 2026</td>
                                    <td><span class="badge badge-success-status">Disetujui</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" disabled>Setuju</button>
                                        <button class="btn-tolak" disabled>Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>Rudi</td>
                                    <td><a href="#" class="link-file">proposal_epsilon.pdf</a></td>
                                    <td>16 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end page-verifikasi-proposal -->

            <!-- PAGE: Verifikasi Berkas -->
            <div id="page-verifikasi-berkas" class="page">
                <div class="page-title-bar">
                    <h1>Verifikasi Berkas</h1>
                    <span class="page-subtitle">Periksa kelengkapan berkas administrasi setiap kelompok</span>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Ketua</th>
                                    <th>Jml. Berkas</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tim Alpha</td>
                                    <td>Tegar</td>
                                    <td>3 / 5 berkas</td>
                                    <td>21 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Beta</td>
                                    <td>Rina</td>
                                    <td>5 / 5 berkas</td>
                                    <td>20 Apr 2026</td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-group">
                                        <button class="btn-setuju" onclick="setujuRow(this)">Setuju</button>
                                        <button class="btn-tolak" onclick="tolakRow(this)">Tolak</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end page-verifikasi-berkas -->

            <!-- PAGE: Plotting -->
            <div id="page-plotting" class="page">
                <div class="page-title-bar">
                    <h1>Plotting Kelompok</h1>
                    <span class="page-subtitle">Tetapkan lokasi magang dan dosen pembimbing untuk setiap kelompok</span>
                </div>

                <!-- Filter Bar -->
                <div class="plotting-toolbar">
                    <div class="plot-search-wrap">
                        <span class="plot-search-icon">&#128269;</span>
                        <input type="text" id="plot-search" class="plot-search-input"
                            placeholder="Cari nama kelompok atau ketua..." oninput="filterTabelPlotting()">
                    </div>
                    <div class="plot-filter-group">
                        <button class="plot-filter-btn active" id="filter-all"
                            onclick="filterStatus('all', this)">Semua</button>
                        <button class="plot-filter-btn" id="filter-selesai"
                            onclick="filterStatus('selesai', this)">Selesai</button>
                        <button class="plot-filter-btn" id="filter-menunggu"
                            onclick="filterStatus('menunggu', this)">Belum Diplot</button>
                    </div>
                </div>

                <!-- Tabel Plotting -->
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table" id="tabel-plotting">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Ketua</th>
                                    <th>Jml. Anggota</th>
                                    <th>Lokasi Magang</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-plotting">
                                <tr>
                                    <td>Tim Alpha</td>
                                    <td>Tegar</td>
                                    <td>5</td>
                                    <td class="col-lokasi">PT. Telkom Indonesia</td>
                                    <td class="col-dosen">Dr. Budi Santoso, M.Kom</td>
                                    <td><span class="badge badge-success-status">Selesai</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-edit-plot" onclick="bukaModalPlot(this, true)">&#9998;
                                            Edit</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Beta</td>
                                    <td>Rina</td>
                                    <td>4</td>
                                    <td class="col-lokasi"><em class="belum">Belum diplot</em></td>
                                    <td class="col-dosen"><em class="belum">Belum ditentukan</em></td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-plot" onclick="bukaModalPlot(this, false)">&#43;
                                            Plot</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Gamma</td>
                                    <td>Budi</td>
                                    <td>5</td>
                                    <td class="col-lokasi">CV. Nusantara Tech</td>
                                    <td class="col-dosen">Ir. Siti Rahayu, M.T</td>
                                    <td><span class="badge badge-success-status">Selesai</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-edit-plot" onclick="bukaModalPlot(this, true)">&#9998;
                                            Edit</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Delta</td>
                                    <td>Aldi</td>
                                    <td>5</td>
                                    <td class="col-lokasi"><em class="belum">Belum diplot</em></td>
                                    <td class="col-dosen"><em class="belum">Belum ditentukan</em></td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-plot" onclick="bukaModalPlot(this, false)">&#43;
                                            Plot</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Epsilon</td>
                                    <td>Sari</td>
                                    <td>3</td>
                                    <td class="col-lokasi"><em class="belum">Belum diplot</em></td>
                                    <td class="col-dosen"><em class="belum">Belum ditentukan</em></td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-plot" onclick="bukaModalPlot(this, false)">&#43;
                                            Plot</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tim Zeta</td>
                                    <td>Hendra</td>
                                    <td>4</td>
                                    <td class="col-lokasi"><em class="belum">Belum diplot</em></td>
                                    <td class="col-dosen"><em class="belum">Belum ditentukan</em></td>
                                    <td><span class="badge badge-warning">Menunggu</span></td>
                                    <td class="aksi-plot-group">
                                        <button class="btn-plot" onclick="bukaModalPlot(this, false)">&#43;
                                            Plot</button>
                                        <button class="btn-detail-plot"
                                            onclick="bukaDetailKelompok(this)">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Rekap Dosen Pembimbing -->
                <div class="card">
                    <div class="card-header-plain">
                        <h3>Rekapitulasi Dosen Pembimbing</h3>
                    </div>
                    <div class="card-body">
                        <div class="dosen-rekap-grid" id="dosen-rekap-grid">
                            <!-- Diisi oleh JS -->
                        </div>
                    </div>
                </div>

            </div><!-- end page-plotting -->

        </main>
    </div>

    <!-- Modal Verifikasi -->
    <div id="modal-verifikasi" class="modal-overlay" onclick="tutupModal(event)">
        <div class="modal-box">
            <div class="modal-header">
                <h3>Detail Verifikasi</h3>
                <button class="modal-close" onclick="tutupModalBtn()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-row"><span class="modal-label">Nama Kelompok</span><span class="modal-val"
                        id="mKelompok">-</span></div>
                <div class="modal-row"><span class="modal-label">Ketua</span><span class="modal-val"
                        id="mKetua">-</span></div>
                <div class="modal-row"><span class="modal-label">Jenis Verifikasi</span><span class="modal-val"
                        id="mJenis">-</span></div>
                <div class="modal-row"><span class="modal-label">Status Saat Ini</span><span class="modal-val"
                        id="mStatus">-</span></div>
                <div class="modal-catatan">
                    <label for="catatan-modal">Catatan (opsional)</label>
                    <textarea id="catatan-modal" placeholder="Tulis catatan untuk kelompok ini..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-tolak-modal" onclick="aksiModal('tolak')">Tolak</button>
                <button class="btn-setuju-modal" onclick="aksiModal('setuju')">Setujui</button>
            </div>
        </div>
    </div>

    <!-- Modal Plotting -->
    <div id="modal-plotting" class="modal-overlay" onclick="tutupModalPlotOverlay(event)">
        <div class="modal-box modal-plot-box">
            <div class="modal-header">
                <h3 id="plot-modal-title">Plotting Kelompok</h3>
                <button class="modal-close" onclick="tutupModalPlotBtn()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-info-strip">
                    <div class="modal-info-item">
                        <span class="modal-info-label">Kelompok</span>
                        <span class="modal-info-val" id="pKelompok">-</span>
                    </div>
                    <div class="modal-info-item">
                        <span class="modal-info-label">Ketua</span>
                        <span class="modal-info-val" id="pKetua">-</span>
                    </div>
                    <div class="modal-info-item">
                        <span class="modal-info-label">Anggota</span>
                        <span class="modal-info-val" id="pAnggota">-</span>
                    </div>
                </div>

                <!-- Lokasi Magang -->
                <div class="plot-field">
                    <label for="plot-lokasi">Lokasi Magang <span class="required">*</span></label>
                    <select id="plot-lokasi" class="plot-select">
                        <option value="">-- Pilih Lokasi --</option>
                        <option>PT. Telkom Indonesia</option>
                        <option>PT. Pertamina Digital</option>
                        <option>CV. Nusantara Tech</option>
                        <option>PT. XYZ Solusi Digital</option>
                        <option>PT. Bank BRI Tbk</option>
                        <option>CV. Kreatif Media</option>
                        <option>PT. Astra International</option>
                        <option>Dinas Kominfo Kota Malang</option>
                    </select>
                </div>

                <!-- Dosen Pembimbing -->
                <div class="plot-field">
                    <label for="plot-dosen">Dosen Pembimbing <span class="required">*</span></label>
                    <select id="plot-dosen" class="plot-select" onchange="tampilInfoDosen()">
                        <option value="">-- Pilih Dosen Pembimbing --</option>
                        <option>Dr. Budi Santoso, M.Kom</option>
                        <option>Ir. Siti Rahayu, M.T</option>
                        <option>Prof. Ahmad Fauzi, Ph.D</option>
                        <option>Dra. Rina Wulandari, M.Si</option>
                        <option>Dr. Hendra Kurniawan, M.Kom</option>
                        <option>Ir. Dewi Lestari, M.T</option>
                        <option>Dr. Fajar Nugroho, M.Sc</option>
                        <option>Drs. Yusuf Hidayat, M.Pd</option>
                    </select>
                    <!-- Info beban dosen -->
                    <div id="dosen-info-box" class="dosen-info-box" style="display:none;">
                        <span class="dosen-info-icon">&#128100;</span>
                        <span id="dosen-info-text"></span>
                    </div>
                </div>

                <p id="plot-error" style="color:#EA5455;font-size:12px;margin-top:4px;display:none;">Harap pilih lokasi
                    dan dosen pembimbing.</p>
            </div>
            <div class="modal-footer">
                <button class="btn-batal-modal" onclick="tutupModalPlotBtn()">Batal</button>
                <button class="btn-setuju-modal" onclick="simpanPlot()">&#10003; Simpan Plotting</button>
            </div>
        </div>
    </div>

    <!-- Modal Detail Kelompok -->
    <div id="modal-detail-kelompok" class="modal-overlay" onclick="tutupDetailOverlay(event)">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="detail-modal-title">Detail Kelompok</h3>
                <button class="modal-close" onclick="tutupDetail()">&times;</button>
            </div>
            <div class="modal-body" id="detail-modal-body">
                <!-- Diisi oleh JS -->
            </div>
            <div class="modal-footer">
                <button class="btn-batal-modal" onclick="tutupDetail()">Tutup</button>
                <button class="btn-setuju-modal" id="detail-to-plot-btn" onclick="lanjutPlotDariDetail()">&#9998; Plot
                    Kelompok Ini</button>
            </div>
        </div>
    </div>

    <script src="../js/koordinator.js"></script>
</body>

</html>