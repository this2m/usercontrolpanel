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

// $loggedinID = $_SESSION['Username'];
// $query = $db->prepare("SELECT * from owners where Username = '$loggedinID'");
$query = $db->prepare("SELECT * FROM accounts WHERE account");
$query->execute();
$gData = $query->fetch();
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

  fieldset.submit-buttons+.panel {
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
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  }
</style>

<br><br><br><br><br><br><br>

<?php


if (isset($_POST["submit"])) {
  
  if (!htmlspecialchars(trim($_POST['name'])) || !preg_match('#^[a-zA-Z1-9]+_[a-zA-Z1-9]+$#', $_POST['name'])) {
    echo '<div class="alert alert-danger">Geçerli bir karakter adı girmediniz.</div>';
  }

  else if (!htmlspecialchars(trim($_POST['birthdate'])) || ($_POST['birthdate'] < 1900 || $_POST['birthdate'] > 2005)) {
    echo '<div class="alert alert-danger">Karakter doğum yılı sınırlar arasında girmelisiniz.</div>';
  } 
  else {
    $kadsorgu = $db->prepare('SELECT * FROM karakterler WHERE name = :name');
    $kadsorgu->execute([
      'name' => $_POST['name']
    ]);

    if ($kadsorgu) {
      if ($kadsorgu->rowCount() > 0) {
        echo '<div class="alert alert-danger">Bu karakter adı kullanılıyor.</div>';
      } 
      else {
        $owner = $_POST['owner']; // Hesap İsmi
        $name = $_POST['name']; // Karakter İsmi
        $email = $_POST['email'];
        $origin = $_POST['origin']; // Köken
        $gender = $_POST['gender']; // Cinsiyet
        $birthdate = $_POST['birthdate']; // Doğum Tarihi
        $aciklama = $_POST['aciklama']; // Açıklama 1
        $aciklama2 = $_POST['aciklama2']; // Açıklama 2

        $sql  = "INSERT INTO basvurular (owner, name, email, origin, gender, birthdate, aciklama, aciklama2)VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $sayfabakankarakter = $stmt->fetch();
        $stmt->execute(array(
          $owner,
          $name,
          $email,
          $origin,
          $gender,
          $birthdate,
          $aciklama,
          $aciklama2
        ));
      }
    }
  }
}
?>

<style>
  .ui-helper-hidden {
    display: none
  }

  .ui-helper-hidden-accessible {
    position: absolute;
    left: -99999999px
  }

  .ui-helper-reset {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    line-height: 1.3;
    text-decoration: none;
    font-size: 100%;
    list-style: none
  }

  .ui-helper-clearfix:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden
  }

  .ui-helper-clearfix {
    display: inline-block
  }

  * html .ui-helper-clearfix {
    height: 1%
  }

  .ui-helper-clearfix {
    display: block
  }

  .ui-helper-zfix {
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    position: absolute;
    opacity: 0;
    filter: Alpha(Opacity=0)
  }

  .ui-state-disabled {
    cursor: default !important
  }

  .ui-icon {
    display: block;
    text-indent: -99999px;
    overflow: hidden;
    background-repeat: no-repeat
  }

  .ui-widget-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%
  }

  .ui-widget {
    font-family: Segoe UI, Arial, sans-serif;
    font-size: 1.1em
  }

  .ui-widget .ui-widget {
    font-size: 1em
  }

  .ui-widget input,
  .ui-widget select,
  .ui-widget textarea,
  .ui-widget button {
    font-family: Segoe UI, Arial, sans-serif;
    font-size: 1em
  }

  .ui-widget-content {
    border: 1px solid #666;
    background: #000 url(images/ui-bg_inset-soft_25_000000_1x100.png) 50% bottom repeat-x;
    color: #fff
  }

  .ui-widget-content a {
    color: #fff
  }

  .ui-widget-header {
    border: 1px solid #333;
    background: #333 url(images/ui-bg_gloss-wave_25_333333_500x100.png) 50% 50% repeat-x;
    color: #fff;
    font-weight: 700
  }

  .ui-widget-header a {
    color: #fff
  }

  .ui-state-default,
  .ui-widget-content .ui-state-default {
    border: 1px solid #666;
    background: #555 url(images/ui-bg_glass_20_555555_1x400.png) 50% 50% repeat-x;
    font-weight: 700;
    color: #eee;
    outline: none
  }

  .ui-state-default a,
  .ui-state-default a:link,
  .ui-state-default a:visited {
    color: #eee;
    text-decoration: none;
    outline: none
  }

  .ui-state-hover,
  .ui-widget-content .ui-state-hover,
  .ui-state-focus,
  .ui-widget-content .ui-state-focus {
    border: 1px solid #59b4d4;
    background: #0078a3 url(images/ui-bg_glass_40_0078a3_1x400.png) 50% 50% repeat-x;
    font-weight: 700;
    color: #fff;
    outline: none
  }

  .ui-state-hover a,
  .ui-state-hover a:hover {
    color: #fff;
    text-decoration: none;
    outline: none
  }

  .ui-state-active,
  .ui-widget-content .ui-state-active {
    border: 1px solid #ffaf0f;
    background: #f58400 url(images/ui-bg_inset-soft_30_f58400_1x100.png) 50% 50% repeat-x;
    font-weight: 700;
    color: #fff;
    outline: none
  }

  .ui-state-active a,
  .ui-state-active a:link,
  .ui-state-active a:visited {
    color: #fff;
    outline: none;
    text-decoration: none
  }

  .ui-state-highlight,
  .ui-widget-content .ui-state-highlight {
    border: 1px solid #ccc;
    background: #282828 url(images/ui-bg_highlight-soft_80_eeeeee_1x100.png) 50% top repeat-x;
    color: #e7e7e7
  }

  .ui-state-highlight a,
  .ui-widget-content .ui-state-highlight a {
    color: #2e7db2
  }

  .ui-state-error,
  .ui-widget-content .ui-state-error {
    border: 1px solid #ffb73d;
    background: #ffc73d url(images/ui-bg_glass_40_ffc73d_1x400.png) 50% 50% repeat-x;
    color: #111
  }

  .ui-state-error a,
  .ui-widget-content .ui-state-error a {
    color: #111
  }

  .ui-state-error-text,
  .ui-widget-content .ui-state-error-text {
    color: #111
  }

  .ui-state-disabled,
  .ui-widget-content .ui-state-disabled {
    opacity: .35;
    filter: Alpha(Opacity=35);
    background-image: none
  }

  .ui-priority-primary,
  .ui-widget-content .ui-priority-primary {
    font-weight: 700
  }

  .ui-priority-secondary,
  .ui-widget-content .ui-priority-secondary {
    opacity: .7;
    filter: Alpha(Opacity=70);
    font-weight: 400
  }

  .ui-icon {
    width: 16px;
    height: 16px;
    background-image: url(images/ui-icons_cccccc_256x240.png)
  }

  .ui-widget-content .ui-icon {
    background-image: url(images/ui-icons_cccccc_256x240.png)
  }

  .ui-widget-header .ui-icon {
    background-image: url(images/ui-icons_ffffff_256x240.png)
  }

  .ui-state-default .ui-icon {
    background-image: url(images/ui-icons_cccccc_256x240.png)
  }

  .ui-state-hover .ui-icon,
  .ui-state-focus .ui-icon {
    background-image: url(images/ui-icons_ffffff_256x240.png)
  }

  .ui-state-active .ui-icon {
    background-image: url(images/ui-icons_222222_256x240.png)
  }

  .ui-state-highlight .ui-icon {
    background-image: url(images/ui-icons_4b8e0b_256x240.png)
  }

  .ui-state-error .ui-icon,
  .ui-state-error-text .ui-icon {
    background-image: url(images/ui-icons_a83300_256x240.png)
  }

  .ui-icon-carat-1-n {
    background-position: 0 0
  }

  .ui-icon-carat-1-ne {
    background-position: -16px 0
  }

  .ui-icon-carat-1-e {
    background-position: -32px 0
  }

  .ui-icon-carat-1-se {
    background-position: -48px 0
  }

  .ui-icon-carat-1-s {
    background-position: -64px 0
  }

  .ui-icon-carat-1-sw {
    background-position: -80px 0
  }

  .ui-icon-carat-1-w {
    background-position: -96px 0
  }

  .ui-icon-carat-1-nw {
    background-position: -112px 0
  }

  .ui-icon-carat-2-n-s {
    background-position: -128px 0
  }

  .ui-icon-carat-2-e-w {
    background-position: -144px 0
  }

  .ui-icon-triangle-1-n {
    background-position: 0 -16px
  }

  .ui-icon-triangle-1-ne {
    background-position: -16px -16px
  }

  .ui-icon-triangle-1-e {
    background-position: -32px -16px
  }

  .ui-icon-triangle-1-se {
    background-position: -48px -16px
  }

  .ui-icon-triangle-1-s {
    background-position: -64px -16px
  }

  .ui-icon-triangle-1-sw {
    background-position: -80px -16px
  }

  .ui-icon-triangle-1-w {
    background-position: -96px -16px
  }

  .ui-icon-triangle-1-nw {
    background-position: -112px -16px
  }

  .ui-icon-triangle-2-n-s {
    background-position: -128px -16px
  }

  .ui-icon-triangle-2-e-w {
    background-position: -144px -16px
  }

  .ui-icon-arrow-1-n {
    background-position: 0 -32px
  }

  .ui-icon-arrow-1-ne {
    background-position: -16px -32px
  }

  .ui-icon-arrow-1-e {
    background-position: -32px -32px
  }

  .ui-icon-arrow-1-se {
    background-position: -48px -32px
  }

  .ui-icon-arrow-1-s {
    background-position: -64px -32px
  }

  .ui-icon-arrow-1-sw {
    background-position: -80px -32px
  }

  .ui-icon-arrow-1-w {
    background-position: -96px -32px
  }

  .ui-icon-arrow-1-nw {
    background-position: -112px -32px
  }

  .ui-icon-arrow-2-n-s {
    background-position: -128px -32px
  }

  .ui-icon-arrow-2-ne-sw {
    background-position: -144px -32px
  }

  .ui-icon-arrow-2-e-w {
    background-position: -160px -32px
  }

  .ui-icon-arrow-2-se-nw {
    background-position: -176px -32px
  }

  .ui-icon-arrowstop-1-n {
    background-position: -192px -32px
  }

  .ui-icon-arrowstop-1-e {
    background-position: -208px -32px
  }

  .ui-icon-arrowstop-1-s {
    background-position: -224px -32px
  }

  .ui-icon-arrowstop-1-w {
    background-position: -240px -32px
  }

  .ui-icon-arrowthick-1-n {
    background-position: 0 -48px
  }

  .ui-icon-arrowthick-1-ne {
    background-position: -16px -48px
  }

  .ui-icon-arrowthick-1-e {
    background-position: -32px -48px
  }

  .ui-icon-arrowthick-1-se {
    background-position: -48px -48px
  }

  .ui-icon-arrowthick-1-s {
    background-position: -64px -48px
  }

  .ui-icon-arrowthick-1-sw {
    background-position: -80px -48px
  }

  .ui-icon-arrowthick-1-w {
    background-position: -96px -48px
  }

  .ui-icon-arrowthick-1-nw {
    background-position: -112px -48px
  }

  .ui-icon-arrowthick-2-n-s {
    background-position: -128px -48px
  }

  .ui-icon-arrowthick-2-ne-sw {
    background-position: -144px -48px
  }

  .ui-icon-arrowthick-2-e-w {
    background-position: -160px -48px
  }

  .ui-icon-arrowthick-2-se-nw {
    background-position: -176px -48px
  }

  .ui-icon-arrowthickstop-1-n {
    background-position: -192px -48px
  }

  .ui-icon-arrowthickstop-1-e {
    background-position: -208px -48px
  }

  .ui-icon-arrowthickstop-1-s {
    background-position: -224px -48px
  }

  .ui-icon-arrowthickstop-1-w {
    background-position: -240px -48px
  }

  .ui-icon-arrowreturnthick-1-w {
    background-position: 0 -64px
  }

  .ui-icon-arrowreturnthick-1-n {
    background-position: -16px -64px
  }

  .ui-icon-arrowreturnthick-1-e {
    background-position: -32px -64px
  }

  .ui-icon-arrowreturnthick-1-s {
    background-position: -48px -64px
  }

  .ui-icon-arrowreturn-1-w {
    background-position: -64px -64px
  }

  .ui-icon-arrowreturn-1-n {
    background-position: -80px -64px
  }

  .ui-icon-arrowreturn-1-e {
    background-position: -96px -64px
  }

  .ui-icon-arrowreturn-1-s {
    background-position: -112px -64px
  }

  .ui-icon-arrowrefresh-1-w {
    background-position: -128px -64px
  }

  .ui-icon-arrowrefresh-1-n {
    background-position: -144px -64px
  }

  .ui-icon-arrowrefresh-1-e {
    background-position: -160px -64px
  }

  .ui-icon-arrowrefresh-1-s {
    background-position: -176px -64px
  }

  .ui-icon-arrow-4 {
    background-position: 0 -80px
  }

  .ui-icon-arrow-4-diag {
    background-position: -16px -80px
  }

  .ui-icon-extlink {
    background-position: -32px -80px
  }

  .ui-icon-newwin {
    background-position: -48px -80px
  }

  .ui-icon-refresh {
    background-position: -64px -80px
  }

  .ui-icon-shuffle {
    background-position: -80px -80px
  }

  .ui-icon-transfer-e-w {
    background-position: -96px -80px
  }

  .ui-icon-transferthick-e-w {
    background-position: -112px -80px
  }

  .ui-icon-folder-collapsed {
    background-position: 0 -96px
  }

  .ui-icon-folder-open {
    background-position: -16px -96px
  }

  .ui-icon-document {
    background-position: -32px -96px
  }

  .ui-icon-document-b {
    background-position: -48px -96px
  }

  .ui-icon-note {
    background-position: -64px -96px
  }

  .ui-icon-mail-closed {
    background-position: -80px -96px
  }

  .ui-icon-mail-open {
    background-position: -96px -96px
  }

  .ui-icon-suitcase {
    background-position: -112px -96px
  }

  .ui-icon-comment {
    background-position: -128px -96px
  }

  .ui-icon-person {
    background-position: -144px -96px
  }

  .ui-icon-print {
    background-position: -160px -96px
  }

  .ui-icon-trash {
    background-position: -176px -96px
  }

  .ui-icon-locked {
    background-position: -192px -96px
  }

  .ui-icon-unlocked {
    background-position: -208px -96px
  }

  .ui-icon-bookmark {
    background-position: -224px -96px
  }

  .ui-icon-tag {
    background-position: -240px -96px
  }

  .ui-icon-home {
    background-position: 0 -112px
  }

  .ui-icon-flag {
    background-position: -16px -112px
  }

  .ui-icon-calendar {
    background-position: -32px -112px
  }

  .ui-icon-cart {
    background-position: -48px -112px
  }

  .ui-icon-pencil {
    background-position: -64px -112px
  }

  .ui-icon-clock {
    background-position: -80px -112px
  }

  .ui-icon-disk {
    background-position: -96px -112px
  }

  .ui-icon-calculator {
    background-position: -112px -112px
  }

  .ui-icon-zoomin {
    background-position: -128px -112px
  }

  .ui-icon-zoomout {
    background-position: -144px -112px
  }

  .ui-icon-search {
    background-position: -160px -112px
  }

  .ui-icon-wrench {
    background-position: -176px -112px
  }

  .ui-icon-gear {
    background-position: -192px -112px
  }

  .ui-icon-heart {
    background-position: -208px -112px
  }

  .ui-icon-star {
    background-position: -224px -112px
  }

  .ui-icon-link {
    background-position: -240px -112px
  }

  .ui-icon-cancel {
    background-position: 0 -128px
  }

  .ui-icon-plus {
    background-position: -16px -128px
  }

  .ui-icon-plusthick {
    background-position: -32px -128px
  }

  .ui-icon-minus {
    background-position: -48px -128px
  }

  .ui-icon-minusthick {
    background-position: -64px -128px
  }

  .ui-icon-close {
    background-position: -80px -128px
  }

  .ui-icon-closethick {
    background-position: -96px -128px
  }

  .ui-icon-key {
    background-position: -112px -128px
  }

  .ui-icon-lightbulb {
    background-position: -128px -128px
  }

  .ui-icon-scissors {
    background-position: -144px -128px
  }

  .ui-icon-clipboard {
    background-position: -160px -128px
  }

  .ui-icon-copy {
    background-position: -176px -128px
  }

  .ui-icon-contact {
    background-position: -192px -128px
  }

  .ui-icon-image {
    background-position: -208px -128px
  }

  .ui-icon-video {
    background-position: -224px -128px
  }

  .ui-icon-script {
    background-position: -240px -128px
  }

  .ui-icon-alert {
    background-position: 0 -144px
  }

  .ui-icon-info {
    background-position: -16px -144px
  }

  .ui-icon-notice {
    background-position: -32px -144px
  }

  .ui-icon-help {
    background-position: -48px -144px
  }

  .ui-icon-check {
    background-position: -64px -144px
  }

  .ui-icon-bullet {
    background-position: -80px -144px
  }

  .ui-icon-radio-off {
    background-position: -96px -144px
  }

  .ui-icon-radio-on {
    background-position: -112px -144px
  }

  .ui-icon-pin-w {
    background-position: -128px -144px
  }

  .ui-icon-pin-s {
    background-position: -144px -144px
  }

  .ui-icon-play {
    background-position: 0 -160px
  }

  .ui-icon-pause {
    background-position: -16px -160px
  }

  .ui-icon-seek-next {
    background-position: -32px -160px
  }

  .ui-icon-seek-prev {
    background-position: -48px -160px
  }

  .ui-icon-seek-end {
    background-position: -64px -160px
  }

  .ui-icon-seek-first {
    background-position: -80px -160px
  }

  .ui-icon-stop {
    background-position: -96px -160px
  }

  .ui-icon-eject {
    background-position: -112px -160px
  }

  .ui-icon-volume-off {
    background-position: -128px -160px
  }

  .ui-icon-volume-on {
    background-position: -144px -160px
  }

  .ui-icon-power {
    background-position: 0 -176px
  }

  .ui-icon-signal-diag {
    background-position: -16px -176px
  }

  .ui-icon-signal {
    background-position: -32px -176px
  }

  .ui-icon-battery-0 {
    background-position: -48px -176px
  }

  .ui-icon-battery-1 {
    background-position: -64px -176px
  }

  .ui-icon-battery-2 {
    background-position: -80px -176px
  }

  .ui-icon-battery-3 {
    background-position: -96px -176px
  }

  .ui-icon-circle-plus {
    background-position: 0 -192px
  }

  .ui-icon-circle-minus {
    background-position: -16px -192px
  }

  .ui-icon-circle-close {
    background-position: -32px -192px
  }

  .ui-icon-circle-triangle-e {
    background-position: -48px -192px
  }

  .ui-icon-circle-triangle-s {
    background-position: -64px -192px
  }

  .ui-icon-circle-triangle-w {
    background-position: -80px -192px
  }

  .ui-icon-circle-triangle-n {
    background-position: -96px -192px
  }

  .ui-icon-circle-arrow-e {
    background-position: -112px -192px
  }

  .ui-icon-circle-arrow-s {
    background-position: -128px -192px
  }

  .ui-icon-circle-arrow-w {
    background-position: -144px -192px
  }

  .ui-icon-circle-arrow-n {
    background-position: -160px -192px
  }

  .ui-icon-circle-zoomin {
    background-position: -176px -192px
  }

  .ui-icon-circle-zoomout {
    background-position: -192px -192px
  }

  .ui-icon-circle-check {
    background-position: -208px -192px
  }

  .ui-icon-circlesmall-plus {
    background-position: 0 -208px
  }

  .ui-icon-circlesmall-minus {
    background-position: -16px -208px
  }

  .ui-icon-circlesmall-close {
    background-position: -32px -208px
  }

  .ui-icon-squaresmall-plus {
    background-position: -48px -208px
  }

  .ui-icon-squaresmall-minus {
    background-position: -64px -208px
  }

  .ui-icon-squaresmall-close {
    background-position: -80px -208px
  }

  .ui-icon-grip-dotted-vertical {
    background-position: 0 -224px
  }

  .ui-icon-grip-dotted-horizontal {
    background-position: -16px -224px
  }

  .ui-icon-grip-solid-vertical {
    background-position: -32px -224px
  }

  .ui-icon-grip-solid-horizontal {
    background-position: -48px -224px
  }

  .ui-icon-gripsmall-diagonal-se {
    background-position: -64px -224px
  }

  .ui-icon-grip-diagonal-se {
    background-position: -80px -224px
  }

  .ui-corner-tl {
    -moz-border-radius-topleft: 6px;
    -webkit-border-top-left-radius: 6px
  }

  .ui-corner-tr {
    -moz-border-radius-topright: 6px;
    -webkit-border-top-right-radius: 6px
  }

  .ui-corner-bl {
    -moz-border-radius-bottomleft: 6px;
    -webkit-border-bottom-left-radius: 6px
  }

  .ui-corner-br {
    -moz-border-radius-bottomright: 6px;
    -webkit-border-bottom-right-radius: 6px
  }

  .ui-corner-top {
    -moz-border-radius-topleft: 6px;
    -webkit-border-top-left-radius: 6px;
    -moz-border-radius-topright: 6px;
    -webkit-border-top-right-radius: 6px
  }

  .ui-corner-bottom {
    -moz-border-radius-bottomleft: 6px;
    -webkit-border-bottom-left-radius: 6px;
    -moz-border-radius-bottomright: 6px;
    -webkit-border-bottom-right-radius: 6px
  }

  .ui-corner-right {
    -moz-border-radius-topright: 6px;
    -webkit-border-top-right-radius: 6px;
    -moz-border-radius-bottomright: 6px;
    -webkit-border-bottom-right-radius: 6px
  }

  .ui-corner-left {
    -moz-border-radius-topleft: 6px;
    -webkit-border-top-left-radius: 6px;
    -moz-border-radius-bottomleft: 6px;
    -webkit-border-bottom-left-radius: 6px
  }

  .ui-corner-all {
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px
  }

  .ui-widget-overlay {
    background: #5c5c5c url(images/ui-bg_flat_50_5c5c5c_40x100.png) 50% 50% repeat-x;
    opacity: .8;
    filter: Alpha(Opacity=80)
  }

  .ui-widget-shadow {
    margin: -7px 0 0 -7px;
    padding: 7px;
    background: #ccc url(images/ui-bg_flat_30_cccccc_40x100.png) 50% 50% repeat-x;
    opacity: .6;
    filter: Alpha(Opacity=60);
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px
  }

  .ui-accordion .ui-accordion-header {
    cursor: pointer;
    position: relative;
    margin-top: 1px;
    zoom: 1
  }

  .ui-accordion .ui-accordion-li-fix {
    display: inline
  }

  .ui-accordion .ui-accordion-header-active {
    border-bottom: 0 !important
  }

  .ui-accordion .ui-accordion-header a {
    display: block;
    font-size: 1em;
    padding: .5em .5em .5em 2.2em
  }

  .ui-accordion .ui-accordion-header .ui-icon {
    position: absolute;
    left: .5em;
    top: 50%;
    margin-top: -8px
  }

  .ui-accordion .ui-accordion-content {
    padding: 1em 2.2em;
    border-top: 0;
    margin-top: -2px;
    position: relative;
    top: 1px;
    margin-bottom: 2px;
    overflow: auto;
    display: none
  }

  .ui-accordion .ui-accordion-content-active {
    display: block
  }

  .ui-datepicker {
    width: 17em;
    padding: .2em .2em 0
  }

  .ui-datepicker .ui-datepicker-header {
    position: relative;
    padding: .2em 0
  }

  .ui-datepicker .ui-datepicker-prev,
  .ui-datepicker .ui-datepicker-next {
    position: absolute;
    top: 2px;
    width: 1.8em;
    height: 1.8em
  }

  .ui-datepicker .ui-datepicker-prev-hover,
  .ui-datepicker .ui-datepicker-next-hover {
    top: 1px
  }

  .ui-datepicker .ui-datepicker-prev {
    left: 2px
  }

  .ui-datepicker .ui-datepicker-next {
    right: 2px
  }

  .ui-datepicker .ui-datepicker-prev-hover {
    left: 1px
  }

  .ui-datepicker .ui-datepicker-next-hover {
    right: 1px
  }

  .ui-datepicker .ui-datepicker-prev span,
  .ui-datepicker .ui-datepicker-next span {
    display: block;
    position: absolute;
    left: 50%;
    margin-left: -8px;
    top: 50%;
    margin-top: -8px
  }

  .ui-datepicker .ui-datepicker-title {
    margin: 0 2.3em;
    line-height: 1.8em;
    text-align: center
  }

  .ui-datepicker .ui-datepicker-title select {
    float: left;
    font-size: 1em;
    margin: 1px 0
  }

  .ui-datepicker select.ui-datepicker-month-year {
    width: 100%
  }

  .ui-datepicker select.ui-datepicker-month,
  .ui-datepicker select.ui-datepicker-year {
    width: 49%
  }

  .ui-datepicker .ui-datepicker-title select.ui-datepicker-year {
    float: right
  }

  .ui-datepicker table {
    width: 100%;
    font-size: .9em;
    border-collapse: collapse;
    margin: 0 0 .4em
  }

  .ui-datepicker th {
    padding: .7em .3em;
    text-align: center;
    font-weight: 700;
    border: 0
  }

  .ui-datepicker td {
    border: 0;
    padding: 1px
  }

  .ui-datepicker td span,
  .ui-datepicker td a {
    display: block;
    padding: .2em;
    text-align: right;
    text-decoration: none
  }

  .ui-datepicker .ui-datepicker-buttonpane {
    background-image: none;
    margin: .7em 0 0;
    padding: 0 .2em;
    border-left: 0;
    border-right: 0;
    border-bottom: 0
  }

  .ui-datepicker .ui-datepicker-buttonpane button {
    float: right;
    margin: .5em .2em .4em;
    cursor: pointer;
    padding: .2em .6em .3em;
    width: auto;
    overflow: visible
  }

  .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
    float: left
  }

  .ui-datepicker.ui-datepicker-multi {
    width: auto
  }

  .ui-datepicker-multi .ui-datepicker-group {
    float: left
  }

  .ui-datepicker-multi .ui-datepicker-group table {
    width: 95%;
    margin: 0 auto .4em
  }

  .ui-datepicker-multi-2 .ui-datepicker-group {
    width: 50%
  }

  .ui-datepicker-multi-3 .ui-datepicker-group {
    width: 33.3%
  }

  .ui-datepicker-multi-4 .ui-datepicker-group {
    width: 25%
  }

  .ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header {
    border-left-width: 0
  }

  .ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
    border-left-width: 0
  }

  .ui-datepicker-multi .ui-datepicker-buttonpane {
    clear: left
  }

  .ui-datepicker-row-break {
    clear: both;
    width: 100%
  }

  .ui-datepicker-rtl {
    direction: rtl
  }

  .ui-datepicker-rtl .ui-datepicker-prev {
    right: 2px;
    left: auto
  }

  .ui-datepicker-rtl .ui-datepicker-next {
    left: 2px;
    right: auto
  }

  .ui-datepicker-rtl .ui-datepicker-prev:hover {
    right: 1px;
    left: auto
  }

  .ui-datepicker-rtl .ui-datepicker-next:hover {
    left: 1px;
    right: auto
  }

  .ui-datepicker-rtl .ui-datepicker-buttonpane {
    clear: right
  }

  .ui-datepicker-rtl .ui-datepicker-buttonpane button {
    float: left
  }

  .ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current {
    float: right
  }

  .ui-datepicker-rtl .ui-datepicker-group {
    float: right
  }

  .ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
    border-right-width: 0;
    border-left-width: 1px
  }

  .ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
    border-right-width: 0;
    border-left-width: 1px
  }

  .ui-datepicker-cover {
    display: none;
    display: block;
    position: absolute;
    z-index: -1;
    filter: mask();
    top: -4px;
    left: -4px;
    width: 200px;
    height: 200px
  }

  .ui-dialog {
    position: absolute;
    padding: .2em;
    width: 300px;
    overflow: hidden
  }

  .ui-dialog .ui-dialog-titlebar {
    padding: .5em 1em .3em;
    position: relative
  }

  .ui-dialog .ui-dialog-title {
    float: left;
    margin: .1em 16px .2em 0
  }

  .ui-dialog .ui-dialog-titlebar-close {
    position: absolute;
    right: .3em;
    top: 50%;
    width: 19px;
    margin: -10px 0 0;
    padding: 1px;
    height: 18px
  }

  .ui-dialog .ui-dialog-titlebar-close span {
    display: block;
    margin: 1px
  }

  .ui-dialog .ui-dialog-titlebar-close:hover,
  .ui-dialog .ui-dialog-titlebar-close:focus {
    padding: 0
  }

  .ui-dialog .ui-dialog-content {
    border: 0;
    padding: .5em 1em;
    background: 0 0;
    overflow: auto;
    zoom: 1
  }

  .ui-dialog .ui-dialog-buttonpane {
    text-align: left;
    border-width: 1px 0 0;
    background-image: none;
    margin: .5em 0 0;
    padding: .3em 1em .5em .4em
  }

  .ui-dialog .ui-dialog-buttonpane button {
    float: right;
    margin: .5em .4em .5em 0;
    cursor: pointer;
    padding: .2em .6em .3em;
    line-height: 1.4em;
    width: auto;
    overflow: visible
  }

  .ui-dialog .ui-resizable-se {
    width: 14px;
    height: 14px;
    right: 3px;
    bottom: 3px
  }

  .ui-draggable .ui-dialog-titlebar {
    cursor: move
  }

  .ui-progressbar {
    height: 2em;
    text-align: left
  }

  .ui-progressbar .ui-progressbar-value {
    margin: -1px;
    height: 100%
  }

  .ui-resizable {
    position: relative
  }

  .ui-resizable-handle {
    position: absolute;
    font-size: .1px;
    z-index: 99999;
    display: block
  }

  .ui-resizable-disabled .ui-resizable-handle,
  .ui-resizable-autohide .ui-resizable-handle {
    display: none
  }

  .ui-resizable-n {
    cursor: n-resize;
    height: 7px;
    width: 100%;
    top: -5px;
    left: 0
  }

  .ui-resizable-s {
    cursor: s-resize;
    height: 7px;
    width: 100%;
    bottom: -5px;
    left: 0
  }

  .ui-resizable-e {
    cursor: e-resize;
    width: 7px;
    right: -5px;
    top: 0;
    height: 100%
  }

  .ui-resizable-w {
    cursor: w-resize;
    width: 7px;
    left: -5px;
    top: 0;
    height: 100%
  }

  .ui-resizable-se {
    cursor: se-resize;
    width: 12px;
    height: 12px;
    right: 1px;
    bottom: 1px
  }

  .ui-resizable-sw {
    cursor: sw-resize;
    width: 9px;
    height: 9px;
    left: -5px;
    bottom: -5px
  }

  .ui-resizable-nw {
    cursor: nw-resize;
    width: 9px;
    height: 9px;
    left: -5px;
    top: -5px
  }

  .ui-resizable-ne {
    cursor: ne-resize;
    width: 9px;
    height: 9px;
    right: -5px;
    top: -5px
  }

  .ui-slider {
    position: relative;
    text-align: left
  }

  .ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default
  }

  .ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0
  }

  .ui-slider-horizontal {
    height: .8em
  }

  .ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em
  }

  .ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%
  }

  .ui-slider-horizontal .ui-slider-range-min {
    left: 0
  }

  .ui-slider-horizontal .ui-slider-range-max {
    right: 0
  }

  .ui-slider-vertical {
    width: .8em;
    height: 100px
  }

  .ui-slider-vertical .ui-slider-handle {
    left: -.3em;
    margin-left: 0;
    margin-bottom: -.6em
  }

  .ui-slider-vertical .ui-slider-range {
    left: 0;
    width: 100%
  }

  .ui-slider-vertical .ui-slider-range-min {
    bottom: 0
  }

  .ui-slider-vertical .ui-slider-range-max {
    top: 0
  }

  .ui-tabs {
    padding: .2em;
    zoom: 1
  }

  .ui-tabs .ui-tabs-nav {
    list-style: none;
    position: relative;
    padding: .2em .2em 0
  }

  .ui-tabs .ui-tabs-nav li {
    position: relative;
    float: left;
    border-bottom-width: 0 !important;
    margin: 0 .2em -1px 0;
    padding: 0
  }

  .ui-tabs .ui-tabs-nav li a {
    float: left;
    text-decoration: none;
    padding: .5em 1em
  }

  .ui-tabs .ui-tabs-nav li.ui-tabs-selected {
    padding-bottom: 1px;
    border-bottom-width: 0
  }

  .ui-tabs .ui-tabs-nav li.ui-tabs-selected a,
  .ui-tabs .ui-tabs-nav li.ui-state-disabled a,
  .ui-tabs .ui-tabs-nav li.ui-state-processing a {
    cursor: text
  }

  .ui-tabs .ui-tabs-nav li a,
  .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a {
    cursor: pointer
  }

  .ui-tabs .ui-tabs-panel {
    padding: 1em 1.4em;
    display: block;
    border-width: 0;
    background: 0 0
  }

  .ui-tabs .ui-tabs-hide {
    display: none !important
  }
</style>
<div class="col-xl-8 order-xl-1" style="margin: auto;">
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
      <form class="" action="" method="POST" autocomplete="off">
        <div style="padding: 0 .7em;" class="ui-state-highlight ui-corner-all" id="_info">
          <p>
            <span style="float: left; font-size: 1px; margin-right: .3em;"></span>
            Aşağıdaki test bir yazılım tarafından değil, gerçek kişiler tarafından doğrulanacaktır. Ciddi cevaplar verdiğinizden emin olun. Başvurunuz kabul edildiği zaman sunucumuzda bu karakter ile oynayabilirsiniz. Bol şans!
          </p>
        </div>
        <br>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group focused">
                <label class="form-control-label" for="ad">Ad (UCP adı)</label>
                <input type="text" id="input-username" class="form-control form-control-alternative" name="owner" value="<?php echo ($kYaz['account']); ?>" readonly>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="character">Karakter Adı (İsim_Soyad)</label>
                <input type="text" id="input-email" required value="" name="name" class="form-control form-control-alternative">
              </div>
            </div>
          </div>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label" for="gender">Köken (IC)</label>
                  <input type="text" id="input-username" name="origin" required value="" class="form-control form-control-alternative">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="gender-select">Cinsiyet (IC)</label><br>
                  <select class="select" name="gender" id="gender">
                    <option name="gender" value="Erkek">Erkek</option>
                    <option name="gender" value="Kadın">Kadın</option>
                  </select>
                </div>
              </div>

            </div>

            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="birthdate">Doğum Tarihi (IC)</label>
                    <input type="date" id="input-username" name="birthdate" min="1900" max="2004" required value="" class="form-control form-control-alternative">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="character">Email (Sizi bilgilendirmemizin için gerekli)</label>
                    <input type="text" id="input-email" required value="" name="email" class="form-control form-control-alternative">
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Address -->

              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="aciklama">Dolandırıcılık ve soygun politikamızdan bize bahset</label>
                      <textarea rows="10" cols="90" name="aciklama" required value="" class="form-control form-control-alternative"></textarea>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Karakterinizin geçmişi ile kısa bir hikaye yazın. (en az 2 paragraf)</label>
                    <textarea rows="10" cols="90" name="aciklama2" required value="" class="form-control form-control-alternative"></textarea>
                  </div>
                </div>
                <?php
                $karakterler = $db->query("SELECT * FROM accounts WHERE dbid=" . $_SESSION['dbid'] . "");
                foreach ($karakterler as $karaktersorgu) {
                }
                if ($karaktersorgu['karakter1'] != "Yok" && $karaktersorgu['karakter2'] != "Yok" && $karaktersorgu['karakter3'] != "Yok") {
                  // echo '<button type="submit" name="submit" class="btn btn-success">Gönder</button>';
                  echo 'Karakter limitiniz kalmadı!';
                  // echo 'Başarılı bir şekilde başvurunuz gerçekleştirilmiştir.';
                } else {

                  echo '<button type="submit" name="submit" class="btn btn-success">Gönder</button>';
                }
                ?>
                <!-- <button type="submit" name="submit" class="btn btn-success">Gönder</button> -->
                <button class="btn btn-danger" type="reset">Sıfırla</button>
      </form>
    </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>
<?php

?>
<nav class="navbar-default navbar-side" role="navigation">

  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">

      <li>
        <br><br><br><br><br><br><br>


        <a style="font-size: 16px;" style="color:#c3c3c3;"><strong>&nbsp;&nbsp;Eastland Roleplay</strong></a>

        <a class="amm" style="color:#c3c3c3;" style="font-size: 17px;" href="../pages/index.php"><i style="color:#c3c3c3;" class="fa fa-home"></i> Ana Sayfa</a>


        <a class="amm" style="     border-left: 3px solid #55a9fe;
    opacity: 1;
    font-weight: 400; background: hsl(0deg 0% 100% / 6%); color:#c3c3c3;" style="font-size: 17px;" href="../pages/chars.php"><i style="color:#c3c3c3;" class="fa-solid fa-masks-theater"></i> Karakterlerim</a>
        <a class="amm" style="color:#c3c3c3;" style="font-size: 17px;" href="../pages/ticket.php"><i style="color:#c3c3c3;" class="fa fa-ticket"></i> Ticket</a>
        <br>