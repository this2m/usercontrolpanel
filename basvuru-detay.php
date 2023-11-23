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

<style>

.section-category {
    grid-column: 1/-1;
    padding: 10px 0;
    margin: 20px 0;
    border-bottom: 1px solid black;
}

fieldset.submit-buttons {
  text-align: center;
  vertical-align: middle;
  margin: 10px 0;
}

fieldset.submit-buttons input {
    border: medium none;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    height: 36px;
    line-height: 32px;
    outline-style: none !important;
    position: relative;
    text-decoration: none !important;
    vertical-align: bottom;
    white-space: nowrap;
}
fieldset.submit-buttons + .panel {
  margin-top: 20px;
}

.section-category-red {
    grid-column: 1/-1;
    padding: 10px 0;
    margin: 20px 0;
    border-bottom: 1px solid red;
}
</style>
<style>
.row {
  display: flex;
  margin-right: -15px;
  margin-left: -15px;
  flex-wrap: wrap;
}


.col-4,
.col-8,
.col,
.col-md-10,
.col-md-12,
.col-lg-3,
.col-lg-4,
.col-lg-6,
.col-lg-7,
.col-xl-4,
.col-xl-6,
.col-xl-8 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  max-width: 100%;
  flex-basis: 0;
  flex-grow: 1;
}

.col-4 {
  max-width: 33.33333%;
  flex: 0 0 33.33333%;
}

.col-8 {
  max-width: 66.66667%;
  flex: 0 0 66.66667%;
}

@media (min-width: 768px) {

  .col-md-10 {
    max-width: 83.33333%;
    flex: 0 0 83.33333%;
  }

  .col-md-12 {
    max-width: 100%;
    flex: 0 0 100%;
  }
}

@media (min-width: 992px) {

  .col-lg-3 {
    max-width: 25%;
    flex: 0 0 25%;
  }

  .col-lg-4 {
    max-width: 33.33333%;
    flex: 0 0 33.33333%;
  }

  .col-lg-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }

  .col-lg-7 {
    max-width: 58.33333%;
    flex: 0 0 58.33333%;
  }

  .order-lg-2 {
    order: 2;
  }
}

@media (min-width: 1200px) {

  .col-xl-4 {
    max-width: 33.33333%;
    flex: 0 0 33.33333%;
  }

  .col-xl-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }

  .col-xl-8 {
    max-width: 66.66667%;
    flex: 0 0 66.66667%;
  }

  .order-xl-1 {
    order: 1;
  }

  .order-xl-2 {
    order: 2;
  }
}


.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #191c20;
  background-clip: border-box;
}

.card>hr {
  margin-right: 0;
  margin-left: 0;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-header {
  margin-bottom: 0;
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, .05);
  background-color: #141519;
}

.card-header:first-child {
  border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}

.select {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #e7e7e7;
    background-color: #282828;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

</style>

<br><br><br><br><br><br><br>

<?php

$sql ="SELECT * FROM basvurular WHERE bid = ?";
$sorgu = $db->prepare($sql);
$sorgu->execute([
    $_GET['bid'],
    
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <center><img style="
  display: block;
  margin-left: auto;
  width: 50%;" src="../skins/larp-logo.png"></center>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="" action="" method="post" autocomplete="off">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ad">Hesap Adı</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="name" value="<?php echo $kYaz['account'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="character">Karakter Adı</label>
                        <input type="text" id="input-email" name="charname" class="form-control form-control-alternative" value="<?=$satir['name']?>" readonly>
                      </div>
                    </div>
                  </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="gender">Köken</label>
                        <input type="text" id="input-username" name="origin" class="form-control form-control-alternative" value="<?=$satir['origin']?>" readonly>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="gender-select">Cinsiyet</label><br>
                        <input type="text" id="input-username" name="origin" class="form-control form-control-alternative" value="<?=$satir['gender']?>" readonly>
                      </div>
                    </div>

                  </div>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="birthdate">Doğum Tarihi</label>
                        <input type="date" id="input-username" name="birthdate" class="form-control form-control-alternative" value="<?=$satir['birthdate']?>" readonly>
                      </div>
                    </div>
                                        <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="character">Email</label>
                        <input type="text" id="input-email" name="email" class="form-control form-control-alternative" value="<?=$satir['email']?>" readonly>
                      </div>
                    </div>
                  </div>
                                  <hr class="my-4">
                <!-- Address -->

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="rob">Dolandırıcılık ve soygun politikası</label>
                        <input rows="4" type="text" id="input-email" name="email" class="form-control form-control-alternative" value="<?=$satir['aciklama']?>" readonly>
                      </div>
                    </div>
                  </div>
                <hr class="my-4">
                <!-- Description -->

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Karakterin geçmişi</label>
                        <input type="text" id="input-email" name="email" class="form-control form-control-alternative" value="<?=$satir['aciklama2']?>" readonly>
                  </div>
                </div>
                <?php 
                        if (isset($_GET["onay"])) {
                          $owner = $satir['owner']; // Hesap İsmi
                          $name = $satir['name']; // Karakter İsmi
                          // $email = $satir['email'];
                          $bid = $satir['bid']; // Hesap İsmi
                          $sqsd = "INSERT INTO karakterler (owner, name, bid) VALUES (?, ?, ?)";
                          $sorgus = $db->prepare($sqsd);
                          $sorgus->execute(array(
                            $owner,
                            $name,
                            $bid
                          ));
                        };
                ?>
                <a href="?onay=<?= $satir['bid'] ?>" onclick="return confirm('Onaylamak istediğinizden emin misiniz?')" class="btn btn-danger">Onayla</a> -->
                </form></div></div></div></div></form></div></div></div>
                
<?php
include 'includes/footer.php';
?>

        <nav class="navbar-default navbar-side" role="navigation">

            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                       <br><br><br><br><br><br><br>
<br>
