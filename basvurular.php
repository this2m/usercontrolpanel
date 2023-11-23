<?php
require 'header.php';




$_SESSION['oturum'] = true;
$_SESSION['dbid'];

$kCek = $db->query("SELECT * FROM accounts WHERE dbid=" . $_SESSION['dbid'] . "", PDO::FETCH_ASSOC);
$k1Cek = $db->query("SELECT * FROM karakterler WHERE dbid=" . $_SESSION['karakter1dbid'] . "");
$k2Cek = $db->query("SELECT * FROM karakterler WHERE dbid=" . $_SESSION['karakter2dbid'] . "");
$k3Cek = $db->query("SELECT * FROM karakterler WHERE dbid=" . $_SESSION['karakter3dbid'] . "");





foreach ($kCek as $kYaz) {
}

foreach ($k1Cek as $k1Yaz) {
}

foreach ($k2Cek as $k2Yaz) {
}

foreach ($k3Cek as $k3Yaz) {
}

if ($kYaz["admin"]<7){
  header("Location: index.php");
}

if ($kYaz["admin"]==7) {




?>

<br><br><br><br><br><br><br>



<?php


if (isset($_GET['sil'])) {
  $sqlsil = "DELETE FROM `basvurular` WHERE `basvurular`.`bid` = ?";
  $sorgusil = $db->prepare($sqlsil);
  $sorgusil->execute([
    $_GET['sil']
  ]);
}

$sql = "SELECT * FROM basvurular";
$sorgu = $db->prepare($sql);
$sorgu->execute();

?>
<style>
  table {
    border-collapse: collapse;
    font-family: Tahoma, Geneva, sans-serif;
  }

  table td {
    padding: 15px;
  }

  table thead td {
    background-color: #141519;
    color: #ffffff;
    font-weight: bold;
    font-size: 13px;
    border: 1px solid #54585d;
  }

  table tbody td {
    color: #e9e9e9;
    border: 1px solid #5c5c5c;
  }

  table tbody tr {
    background-color: #f9fafb;
  }

  table tbody tr:nth-child(odd) {
    background-color: #191c20;
  }
</style>
<form action="" method="post"></form>
<table style="margin: auto;">
  <thead>
    <tr>
      <td>ID</td>
      <td>Kullanıcı Adı</td>
      <td>Karakter Adı</td>
      <td>Gmail</td>
      <td>İşlemler</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_GET["onay"]) && $_GET["onay"] == $satir['bid']) {
          $bid = $satir['bid']; // Hesap İsmi
          $owner = $satir['owner']; // Hesap İsmi
          $name = $satir['name']; // Karakter İsmi
          $email = $satir['email'];
          $karakterler = $db->query("SELECT * FROM accounts WHERE dbid=" . $_SESSION['dbid'] . "");
          foreach ($karakterler as $karaktersorgu) {
          }
          if($karaktersorgu['karakter1'] == "Yok") { 
            $sqsd = "INSERT INTO karakterler (owner, name, bid) VALUES (?, ?, ?)";
            $sqsdd = $db->exec("UPDATE accounts SET karakter1='$name' WHERE dbid=" . $_SESSION['dbid'] . "");
            $sorgus = $db->prepare($sqsd);
            $sorgus->execute(array(
              $owner,
              $name,
              $bid
            ));
            echo "Karakter 1'e kayıt edildi!";
            } elseif($karaktersorgu['karakter2'] == "Yok") {
            // echo 'karakter1 boş';
            $sqsd = "INSERT INTO karakterler (owner, name, bid) VALUES (?, ?, ?)";
            $sqsdd = $db->exec("UPDATE accounts SET karakter2='$name' WHERE dbid=" . $_SESSION['dbid'] . "");
            $sorgus = $db->prepare($sqsd);
            $sorgus->execute(array(
              $owner,
              $name,
              $bid
            ));
            echo 'Karakter 2 e kayıt edildi!';
            } else if($karaktersorgu['karakter3'] == "Yok") {
            // echo 'karakter1 boş';
            $sqsd = "INSERT INTO karakterler (owner, name, bid) VALUES (?, ?, ?)";
            $sqsdd = $db->exec("UPDATE accounts SET karakter3='$name' WHERE dbid=" . $_SESSION['dbid'] . "");
            $sorgus = $db->prepare($sqsd);
            $sorgus->execute(array(
              $owner,
              $name,
              $bid
            ));
            echo 'Karakter 3 e kayıt edildi!';
            } else {
            echo 'bos karakter slotu yok';
            }
          if (isset($_GET['onay'])) {
            $sqlsil = "DELETE FROM `basvurular` WHERE `basvurular`.`bid` = ?";
            $sorgusil = $db->prepare($sqlsil);
            $sorgusil->execute([
              $_GET['onay']
            ]);
          };
        }
        ?>
        
        <td><?= $satir['bid'] ?></td>
        <td><?= $satir['owner'] ?></td>
        <td><?= $satir['name'] ?></td>
        <td><?= $satir['email'] ?></td>

        <td>
          <div class="btn-group">
            <a href="basvuru-detay.php?bid=<?= $satir['bid'] ?>" class="btn btn-success">Detay</a>
            <!-- <button type="submit" name="submit" class="btn btn-success">Gönder</button> -->
            <a href="?sil=<?= $satir['bid'] ?>" onclick="return confirm('Gerçekten bu başvuruyu silmek istediğinize emin misiniz? Eğer silerseniz geri alamazsınız.')" class="btn btn-danger">Kaldır</a> -->
            <a href="?onay=<?= $satir['bid'] ?>" onclick="return confirm('Onaylamak istediğinizden emin misiniz?')" class="btn btn-danger">Onayla</a> -->
          </div>
        </td>
    </tr>
  </tbody>
<?php } ?>
</table>



</html>
</div>

<?php

?>
<nav class="navbar-default navbar-side" role="navigation">

  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">

      <li>
        <br><br><br><br><br><br><br>
        <?php } ?>