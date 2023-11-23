<?php
require 'header.php';

//$_SESSION['oturum'] = true;
$_SESSION['dbid'];

$kCek = $db->query("SELECT * FROM accounts WHERE dbid=".$_SESSION['dbid']."", PDO::FETCH_ASSOC);
$k1Cek = $db->query("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter1dbid']."");
$k2Cek = $db->query("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter2dbid']."");
$k3Cek = $db->query("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter3dbid']."");

foreach ($kCek as $kYaz) {

}

foreach ($k1Cek as $k1Yaz) {

}

foreach ($k2Cek as $k2Yaz) {

}

foreach ($k3Cek as $k3Yaz) {

}



?>
<section id="karakter-bilgileri">
    <div class="ebubg">
        <h1 class="heading-text bilgiler">Karakter Bilgileri</h1>
        <div class="info">
            <div class="kullanici-bisey">
                <i class="fa-solid fa-user" style="margin: 5px;"></i><?php echo $kYaz['account'];?>
            </div>
            <div class="kullanici-para">
            <i class="fa-solid fa-turkish-lira-sign" style="margin: 5px;"></i>Karakter 1: <?php echo $kYaz['karakter1'];?>
            </div>
            <div class="kullanici-meslek">
            <i class="fa-solid fa-venus-mars" style="margin: 5px;"></i>Karakter 2: <?php echo $kYaz['karakter2'];?>
            </div>
            <div class="kullanici-cete">
                <i class="fa-solid fa-money-bill" style="margin: 5px;"></i>Karakter 3: <?php echo $kYaz['karakter3'];?>
            </div>
        </div>
        <div class="kullanici-skin">
            <!-- <img src="assets/skins/<?php echo $kYaz['skin'];?>.png" alt="Skin"> -->
            <img src="assets/skins/1.png" alt="Skin">
        </div>
    </div>
</section>
<hr>
<section id="karakter-mulk">
    <div class="laexbg">
        <h1 class="heading-text bilgiler">Kullanıcı Biglileri</h1>
        <div class="info">
            <div class="kullanici-ev">
            <i class="fa-solid fa-location-dot" style="margin: 5px;"></i>Son Konum: <?php echo $kYaz['sonkonum'];?>
            </div>
            <div class="kullanici-esya">
            <i class="fa-solid fa-shield" style="margin: 5px;"></i>Yetki: <?php echo $kYaz['yetkili'];?>
            </div>
            <div class="kullanici-aranma">
                <i class="fa-solid fa-star" style="margin: 5px;"></i>Aranma: 4 Yıldız
            </div>
            <div class="kullanici-dukkan">
                <i class="fa-solid fa-shop" style="margin: 5px;"></i>Dükkanlar: 2
            </div>
            <!-- <div class="right">
                    <div class="kullanici-arac">
                        <i class="fa-solid fa-car" style="margin: 5px;"></i>Araç: 2
                    </div>
                </div> -->
        </div>
    </div>
</section>
</section>
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>