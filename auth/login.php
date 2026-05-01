<?php
session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf(
        "SELECT * FROM user WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $_POST["role"];
            
            if ($_POST["role"] === 'korbid') {
                header("Location: ../koordinator/koordinator.php");
            } else {
                header("Location: ../mahasiswa/dashboard.php");
            }
            exit;
        }
    }
    
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Magang Mahasiswa - Login</title>
    <!-- Use Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

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
        <!-- LOGIN VIEW -->
        <section class="split-layout">
            <div class="split-half">
                <div class="form-container" style="margin-left: auto; margin-right: 15%;">
                    <h2>Login</h2>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px; border: 1px solid #c3e6cb; font-size: 14px;">
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <form method="POST" id="login-form">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="login-email" placeholder="sultansalahuddin@students.college.ac.id"
                                required value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="login-password" placeholder="••••••••" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="login-role" required class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="korbid">Koordinator Bidang</option>
                            </select>
                        </div>
                        <?php if ($is_invalid): ?>
                            <p id="login-error" style="color:#EA5455;font-size:13px;margin-bottom:8px;">Email atau password salah.</p>
                        <?php endif; ?>
                        <button type="submit" class="btn-submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="split-half flex-start">
                <div class="text-block" style="padding-left: 10%;">
                    <h2>SIMM</h2>
                    <p>silahkan login untuk mengakses sistem pendaftaran magang online program studi teknik komputer
                    </p>
                </div>
            </div>
        </section>
    </div>



</body>

</html>