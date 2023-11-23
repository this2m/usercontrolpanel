<?php
require 'header.php';

$_SESSION['oturum'] = true;
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

<app-alert _ngcontent-mvt-c171="" ><label style="  position: absolute;
  right: 70px;
  padding: 10px;" for="menuToggle" class="toggleButton md-button md-button--raised">Karakter Oluştur</label><h4 style="position: absolute; color: #ffbb00;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karakterlerin</h4><div _ngcontent-mvt-c170="" class="notice-container type-info"><div _ngcontent-mvt-c170="" class="notice-icon"><br><div _ngcontent-mvt-c170="" class="notice-content">
                </div>	</div>								<?php
									// $loggedinID = echo $k1Yaz['name'];
									// $query = $db->prepare("SELECT * from karakterler where name = .$_SESSION['karakter1dbid'].");
                                    $query = $db->prepare("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter1dbid']."");
									$query->execute();
echo' <div class="karakterler" style="display:flex; margin-top:30px;">';
									while($gData = $query->fetch())
									{
										?>
										<br />

                                            <br><br><br>
                                            <img width="120" height="240" src="assets/image/bigskins/<?php echo $gData['skin']; ?>.png"><br><br></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<br />
										<?php
									}
                                    $queryy = $db->prepare("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter2dbid']."");
									$queryy->execute();
                                    while($gData = $queryy->fetch())
									{
										?>
										<br />
                                            <br><br><br>
                                            <img width="120" height="240" src="assets/image/bigskins/<?php echo $gData['skin']; ?>.png"><br><br></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<br />
										<?php
									}
                                    $queryyy = $db->prepare("SELECT * FROM karakterler WHERE dbid=".$_SESSION['karakter3dbid']."");
									$queryyy->execute();
                                    while($gData = $queryyy->fetch())
									{
										?>
										<br />
                                            <br><br><br>
                                            <img width="120" height="240" src="assets/image/bigskins/<?php echo $gData['skin']; ?>.png"><br><br></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<br />
										<?php
									}
                                    echo'</div>';
									?></div>


    </p>

    <!-- <div>
        <input id="menuToggle" type="checkbox">
        <div class="infobox md-card">
            <div class="md-card-content">
                <h2 style="color: white;">Bir karakter oluşturun!</h2>
                <p>Eğer sunucu kurallarını bildiğinize eminseniz ve karakterinizi oluşturmak için hazırsanız karakteri açmak için alttaki oluştur butonuna basın.</p>
<p>• Sunucu kurallarını okuyabilirsiniz&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;<a style="color: #c3a200;     text-decoration: none;" href="http://losangeles-rp.great-site.net/forum/viewtopic.php?t=6"><strong>Sunucu Kuralları.</strong></a></p>

            </div>
            <div class="md-card-btns"> -->
<?php

// $sended = 0;

//     if ($sended) {
// echo '<a style="color: #009300; text-decoration: none;" href="acilacak.php" class="md-button">Oluştur</a>';
//     } else {
// echo '<a style="color: #009300; text-decoration: none;" href="basvuru.php" class="md-button">Oluştur</a>';
//     } ?>
                <!-- <label style="color: #c30000;" for="menuToggle" class="md-button">Kapat</label>
            </div>
        </div>
    </div> -->

</div>        </app-alert>

