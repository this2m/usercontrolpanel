<?php
include '../assets/config/config.php';
ob_start();
session_start();

if(isset($_SESSION['oturum'])) {
    header('Location: ../index.php');
}
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeta RPG Giriş</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!-- RESPONSIVE -->
    <link rel="stylesheet" media="(max-width: 768px)" href="assets/css/tablet.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="assets/css/mobile.css">
</head>

<body>
    <section id="zeta-bg">
        <header class="bg-dark">
            <nav id="navbar">
                <h1 class="heading-text">Zeta RPG Kontrol Paneli</h1>
                <ul>
                    <li class="nav-item"><a href="https://zeta-rpg.com">Anasayfa</a></li>
                    <li class="nav-item"><a href="https://zeta-rpg.com/forum">Forum</a></li>
                </ul>
            </nav>
        </header>
        <div class="girisbox">
            <h1 class="laex">Zeta RPG</h1>
            <!-- POST Verilerimizi Çektik -->

            <?php
            if ($_POST) {
                $account = $_POST["account"];
                $password = $_POST["password"];

                $query  = $db->query("SELECT * FROM accounts WHERE account='$account' && password='$password'", PDO::FETCH_ASSOC);
                $veriCek = $query->fetch(PDO::FETCH_ASSOC);
                if ($say = $query->rowCount()) {
                    if ($say > 0) {
                        session_start();
                        $_SESSION['oturum'] = true;
                        $_SESSION['account'] = $account;
                        $_SESSION['password'] = $password;
                        $_SESSION["dbid"] = $veriCek["dbid"];
                        $_SESSION["serial"] = $veriCek["serial"];
                        $_SESSION["ip"] = $veriCek["ip"];
                        $_SESSION["karakter1"] = $veriCek["karakter1"];
                        $_SESSION["karakter2"] = $veriCek["karakter2"];
                        $_SESSION["karakter3"] = $veriCek["karakter3"];
                        $_SESSION["name"] = $veriCek["name"];
                        $_SESSION["admin"] = $veriCek["admin"];
                        $_SESSION["karakter1dbid"] = $veriCek["karakter1dbid"];
                        $_SESSION["karakter2dbid"] = $veriCek["karakter2dbid"];
                        $_SESSION["karakter3dbid"] = $veriCek["karakter3dbid"];
                        header('Location:../index.php');
                    } else {
                        echo "oturum açılmadı hata";
                    }
                } else {
                    echo "<h1 class='laex' style='text-align:center;'>Kullanıcı adı veya şifre hatalı</h1>";
                    echo '
            <hr>
				<form action="login.php" method="post">
                <label id="icon" for="name"><i class="fa-solid fa-user" style="margin: -5px;"></i></label>
                <input type="text" name="account" id="account" placeholder="Karakter İsmi" required />
                <label id="icon" for="name"><i class="fa-solid fa-lock" style="margin: -5px;"></i></label>
                <input type="password" name="password" id="password" placeholder="Şifre" required />
					<input type="submit" />
				</form>
			';
                }
            } else {
                echo " <h1 class='laex' text-align:center;> lütfen giriş yapın</h1>";
                echo '
        <hr>
			<form action="login.php" method="post">
            <label id="icon" for="name"><i class="fa-solid fa-user" style="margin: -5px;"></i></label>
            <input type="text" name="account" id="account" placeholder="Karakter İsmi" required />
            <label id="icon" for="name"><i class="fa-solid fa-lock" style="margin: -5px;"></i></label>
            <input type="password" name="password" id="password" placeholder="Şifre" required />

				<input type="submit" />
			</form>
		';
                echo '<p>Oyun içi hesap bilgilerinizi yazarak giriş yapabilirsiniz.</p>';
            }
            ?>
    </section>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>