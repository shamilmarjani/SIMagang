<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Magang Mahasiswa - Daftar Akun</title>
    <!-- Use Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php if (isset($_SESSION['error'])): ?>
        <div id="error-toast" style="position: fixed; top: 20px; right: 20px; background-color: #f44336; color: white; padding: 15px 25px; border-radius: 8px; z-index: 1000; box-shadow: 0 4px 12px rgba(0,0,0,0.15); font-family: 'Inter', sans-serif; font-weight: 500; opacity: 1; transition: opacity 0.5s ease;">
            <?= htmlspecialchars($_SESSION['error']); ?>
        </div>
        <script>
            setTimeout(function() {
                var toast = document.getElementById('error-toast');
                if(toast) {
                    toast.style.opacity = '0';
                    setTimeout(function() { toast.style.display = 'none'; }, 500);
                }
            }, 3500);
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="background-container"></div>

    <header class="navbar">
        <a href="../index.php" class="logo-container">
            <div class="logo-icons">
                <div class="logo-icon y"></div>
                <div class="logo-icon b"></div>
                <div class="logo-icon c"></div>
            </div>
            <div class="logo-text">
                <span class="logo-text-inner">
                    <span class="logo-text-jti">JTI</span>
                    <span class="logo-text-desc">JURUSAN<br>TEKNOLOGI<br>INFORMASI</span>
                </span>
            </div>
        </a>
        <div class="nav-links">
            <a href="login.php" id="link-login">Login</a>
            <a href="register.php" id="link-daftar" class="btn-daftar">Daftar</a>
        </div>
    </header>

    <div id="app">
        <!-- REGISTER VIEW -->
        <section class="split-layout">
            <div class="split-half flex-start" style="padding-left: 15%;">
                <div class="text-block">
                    <h2>SIMM</h2>
                    <p>UYEKDBEJKDLINIMLJDE98KDJCOWJDONJISW7SYNISyeukdbysjiwoduniskidojmuwhnhsjhhd</p>
                </div>
            </div>
            <div class="split-half">
                <div class="form-container">
                    <h2>Daftar Akun</h2>
                    <form action="prosesRegister.php" method="POST" novalidate>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Sultan Salahuddin" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="sultansalahuddin@students.college.ac.id" required>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="tel" name="no_tlp" placeholder="081234567890" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Sultan3587" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" placeholder="Sultan3587" required>
                        </div>
                        <button type="submit" class="btn-submit">Daftar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
