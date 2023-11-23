<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>

<div class="row">
	<div class="col-xs-8 col-md-8" style="float: left;">
		<div class="tabbable-panel">
			<div class="tabbable-line">
				<ul class="nav nav-tabs ">
					<li class="active nav-item">	
						<a href="#karakter" data-toggle="tab" class="nav-link"><span class="fa fa-user-ninja"></span> <strong>Karakter</strong></a>
					</li>
					<li class="nav-item">	
						<a href="#mulkler" data-toggle="tab" class="nav-link"><span class="fa fa-car"></span> <strong>Mülkler</strong></a>
					</li>
					<li class="nav-item">	
						<a href="#sicil" data-toggle="tab" class="nav-link"><span class="fa fa-list"></span> <strong>Sicil</strong></a>
					</li>
					<li class="nav-item">	
						<a href="#birlik" data-toggle="tab" class="nav-link"><span class="fa fa-users"></span> <strong>Birlik</strong></a>
					</li>
					<li class="nav-item">	
						<a href="#sifredegistir" data-toggle="tab" class="nav-link"><span class="fa fa-key"></span> <strong>Şifre Değiştir</strong></a>
					</li>
					<li class="nav-item">	
						<a href="#yonetim" data-toggle="tab" class="nav-link"><span class="fa fa-user-secret"></span> <strong>Yönetim Ekibi</strong></a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fadeIn animated" id="mulkler">
						<?php $arac = $db->prepare("SELECT * FROM araclar WHERE aracSahip={$karaktercek['ID']}"); $arac->execute(); $arac_count = $arac->rowCount(); if ($arac_count < 1) { } else { ?>
						<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-car"></span>Araçlar</span>
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Model</th>
									<th scope="col">Plaka</th>
									<th scope="col">Uber Lisans</th>
									<th scope="col">Kiralık</th>
									<th scope="col">Vergi<th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($arac as $araccek) { ?>
										<tr>
											<th scope="row"><?php echo ucfirst($VehicleName[$araccek['aracModel']]); ?></th>
											<td><?php echo $araccek['aracPlaka']; ?></td>
											<td><span class="badge badge-secondary"><?php if ($araccek['UberLisans'] == 0) { echo 'Hayır'; }else{ echo 'Evet'; } ?></span></td>
											<td><span class="badge badge-secondary"><?php if ($araccek['Kiralik']==1) { echo 'Evet'; } else { echo 'Hayır'; } ?></span></td>
											<td><span class="badge badge-<?php if ($araccek['Vergi'] == 0) { echo 'success'; }else{ echo 'danger'; } ?>">$<?php echo $araccek['Vergi']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								</tbody>
								</table>
								<?php } $ev = $db->prepare("SELECT * FROM evler WHERE evSahip={$karaktercek['ID']}"); $ev->execute(); $ev_count = $ev->rowCount(); if ($ev_count < 1) { } else { ?>
								<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-home"></span>  Evler</span>
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Kapı Numarası</th>
									<th scope="col">Adresi</th>
									<th scope="col">Sistemsel Fiyatı</th>
									<th scope="col">İnterior Seviyesi</th>
									<th scope="col">Vergi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($ev as $evcek) { ?>
										<tr>
											<th scope="row"><?php echo $evcek['evID']; ?></th>
											<th><?php echo $evcek['Adres']; ?></th>
											<td>$<?php echo $evcek['evFiyat']; ?></td>
											<td><?php echo $evcek['Level']; ?></td>
											<td><?php echo $evcek['Vergi']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
						<?php } $biz = $db->prepare("SELECT * FROM isyerleri WHERE isyeriSahip={$karaktercek['ID']}"); $biz->execute(); $biz_count = $biz->rowCount(); if ($biz_count < 1) { } else { ?>
							<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-building"></span>  İşyerleri</span>
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Kapı Numarası</th>
									<th scope="col">Tabela</th>
									<th scope="col">Sistemsel Fiyatı</th>
									<th scope="col">İşyeri Ortağı</th>
									<th scope="col">İşyeri Türü</th>
									<th scope="col">Kasa</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($biz as $bizcek) { ?>
										<tr>
											<th scope="row"><?php echo $bizcek['isyeriID']; ?></th>
											<th><?php echo $bizcek['Ad']; ?></th>
											<td>$<?php echo $bizcek['isyeriFiyat']; ?></td>
											<td><?php echo $bizcek['isyeriOrtak']; ?></td>
											<td><?php echo $bizcek['isyeriTur']; ?></td>
											<td><?php echo $bizcek['isyeriKasa']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php } if ($ev_count < 1 && $arac_count < 1 && $biz_count < 1) { echo '<div class="alert alert-warning">Size ait bir mülk bulunamadı!</div>'; } ?>
							</div>
								<div class="tab-pane fadeIn animated" id="yonetim">
							<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-user-tie"></span>  Yönetim Ekibi</span>
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Yetkili Adı</th>
									<th scope="col">Yetki Durumu</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$yetkiliss = $db->prepare("SELECT * FROM hesaplar");
									$yetkiliss->execute();
									foreach ($yetkiliss as $yceks) {
										if ($yceks['Admin'] > 0) { ?>
										<tr>
											<td><?php echo $yceks['AdminIsim']; ?></td>
											<td><?php if ($yceks['Admin'] == 1) {  echo 'Game Admin I'; }elseif ($yceks['Admin'] == 2) { echo 'Game Admin II'; }elseif ($yceks['Admin'] == 3) { echo 'Game Admin III'; } elseif ($yceks['Admin'] == 4) { echo 'Game Admin IV'; }elseif ($yceks['Admin'] == 5){ echo 'Lead Admin'; } elseif ($yceks['Admin'] == 6){ echo 'Head Admin'; } elseif ($yceks['Admin'] == 7){ echo 'Management'; }	else { echo 'Oyuncu'; } ?></td>
										</tr>
									<?php } } ?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane active fadeIn animated" id="karakter">
								<div class="row">
									<div class="col-xs-6 col-md-6" style="padding-right: 1%;">
										<div class="list-group">
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Sağlık
												<span style="float: right;">
													<?php $can = $karaktercek['Saglik'];
													$exp1 = explode('.', $can);
													
													echo '<span data-toggle="tooltip" style="background-color: #FF00FF;" title="'.$exp1[0].'">
													<div class="progress" style="width: 100px; height: 12px;" >
													<div name="canbari" class="progress-bar progress-canbar progress-bar-striped active" role="progressbar" style="width: '.$exp1[0].'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div></span>'; 
													?>
												</span> 
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Zırh
												<span style="float: right;">
													<?php $can = $zirh = $karaktercek['Zirh']; $exp2 = explode('.', $zirh); echo '<span data-toggle="tooltip" style="background-color: #FF00FF;" title="'.$exp2[0].'"><div class="progress" style="width: 100px; height: 12px;" >
													<div name="canbari" class="progress-bar progress-zirhbar progress-bar-striped active" role="progressbar" style="width: '.$exp2[0].'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div></span>'; ?>
												</span>
											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Para
												<span class="badge badge-primary badge-pill">$<?php echo $karaktercek['Para']; ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Banka Hesabı
												<span class="badge badge-primary badge-pill">$<?php echo $karaktercek['BankaPara']; ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Meslek Durumu
												<span class="badge badge-primary badge-pill"><?php if ($karaktercek['Meslek'] == 0) { echo 'İşsiz'; } else { echo 'Amele'; } ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Hükum Giydi mi?
												<span class="badge badge-primary badge-pill"><?php if ($karaktercek['ICHapis'] == 0) { echo 'Hayır'; } else { echo 'Evet'; } ?></span>
											</a>
										</div>
									</div>
									<div class="col-xs-6 col-md-6" style="padding-left: 1%;">
										<div class="list-group">
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Seviye
												<span class="badge badge-primary badge-pill"><?php echo $karaktercek['Level']; ?> seviye</span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Cinsiyet
												<span class="badge badge-primary badge-pill"><?php if ($karaktercek['Cinsiyet'] == 1) { echo 'Erkek'; } else { echo 'Kadın'; } ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Bakiye
												<span class="badge badge-primary badge-pill"><?php echo $hesapcek['Bakiye']; ?> TL</span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Maske Numarası
												<span class="badge badge-primary badge-pill">#<?php echo $karaktercek['MaskeID']; ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">
												Birlik
												<span class="badge badge-primary badge-pill"><?php $birlik = $db->prepare("SELECT * FROM birlikler WHERE birlikID=:id"); $birlik->execute(array('id' => $karaktercek['birlik'])); $birlik_count = $birlik->rowCount(); if ($birlik_count < 1) { echo 'Yok'; } else { $birlikcek = $birlik->fetch(PDO::FETCH_ASSOC); echo $birlikcek['birlikAd']; } ?></span>
											</a>
											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	
												Yetkili
												<span class="badge badge-primary badge-pill"><?php if ($hesapcek['Admin'] == 0) { echo 'Hayır'; } else { echo 'Evet'; } ?></span>
											</a>
										</div>
									</div>
							<div class="col-xs-6 col-md-6" style="padding-left: 1%;">

								<div class="list-group">



                                    <span style="font-weight: bold; font-size: 16px;"><span class="fa fa-suitcase-rolling"></span>  Envanter</span>







											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Telsiz

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Telefon'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Telefon

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Odun'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Cadir

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Cakmak'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Ehliyet

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Ehliyet'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Boombox

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Kibrit'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Maymuncuk

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['boombox'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

											<a href="#" class="list-group-item d-flex justify-content-between align-items-center">	

												Tezgah

							                   <span class="badge badge-primary badge-pill"><?php if ($karaktercek['Bidon'] == 0) { echo 'Yok'; } else { echo 'Var'; } ?> </span>

											</a>

								    </div>

							</div>			

					 </div>

							

				</div>



							<div class="tab-pane fadeIn animated" id="sifredegistir">





								<div id="tab1" class="tab-pane">

									<div style="margin-top: 10px;" id="sonuc"></div>



									<div style="margin-left: 5%;">



										<ul>

											<li>Şifrenizi farklı platformlardaki şifreler ile <span style="font-weight: bold; color: #ad0505">aynı</span> yapmayın. </li>

											<li>Karakter şifreniz ile gate & ev şifrelerini <span style="font-weight: bold; color: #ad0505">aynı</span> yapmayın. </li>

											<li>Oyun şifrenizi kesinlikle kimseyle <span style="font-weight: bold; color: #ad0505">paylaşmayın.</span></li>

											<li>Şifrenizi karışık haneler yapmanız şifrenizin tahmin edilmesini <span style="font-weight: bold; color: #ad0505">zorlaştıracaktır.</span></li>

											<li>Hesap şifreniz ele geçirilirse San Andreas Roleplay <span style="font-weight: bold; color: #ad0505">sorumlu tutulamaz.</span></li>

											<li>Yöneticiler sizin şifrenizi istemez, şifrenizi yöneticilerle <span style="font-weight: bold; color: #ad0505">bile paylaşmayın.</span></li>

										</ul>



									</div>



									<div style="clear: both;"></div>

									<div style="margin-top: 20px;"></div>

									<?php if (isset($_POST['sifre_degistir'])) { echo '<script>alert("'.$alert.'");</script>'; } ?>

									<form method="POST">

										<div class="col align-self-center">

											<input type="password" class="form-control" placeholder="Yeni Şifre" name="yenisifre" aria-describedby="basic-addon1">

										</div>

										<div style="margin-top: 4px;"> </div>

										<div class="col align-self-center">

											<input type="password" class="form-control" placeholder="Yeni Şifre (Tekrar)" name="yenisifretekrar" aria-describedby="basic-addon1">

										</div>



										<div style="margin-top: 10px;"> </div>



										<div class="col align-self-center" style="padding: 2%">

											<span style="font-weight: bold;">Tüm uyarıları dikkate aldım ve kabul ediyorum.</span>

										</div>



										<div style="margin-top: 2px;"> </div>





										<button type="submit" name="sifre_degistir" class="btn btn-sm btn-block btn-success btn-gradient dark">Şifre Değiştir</button>

									</form>



								</div>



							</div>

							<div class="tab-pane fadeIn animated" id="sicil">



								<?php $sicil = $db->prepare("SELECT * FROM oocsicil WHERE OyuncuID={$karaktercek['ID']}"); $sicil->execute(); $sicil_count = $sicil->rowCount(); if ($sicil_count < 1) { echo '<div class="alert alert-warning">Size ait bir OOC sicil bulunamadı.</div>'; } else { ?>
								<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-align-justify"></span> OOC Sicil</span>
								<hr style="margin: 0px; margin-bottom: 12px; background-color: #9898984d;">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col"><i class="fa fa-tag"></i> Tarih</th>
											<th scope="col">Dakika</th>
											<th scope="col">Tarafından</th>
											<th scope="col">Sebep</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($sicil as $sicilcek) { ?>
											<tr> 
												<th scope="row"><?php echo $sicilcek['Tarih']; ?></th>
												<td><?php echo $sicilcek['Dakika']?></td>
												<td><span class="badge"><?php echo $sicilcek['Admin']; ?></span></td>
												<td><?php echo $sicilcek['Sebep']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php } ?>
											<br />
										<?php $icsicil = $db->prepare("SELECT Tarih,Memur,Sebep FROM sicilkaydi WHERE Oyuncu='{$karaktercek['isim']}'"); $icsicil->execute(); $icsicil_count = $icsicil->rowCount(); if ($icsicil_count < 1) { echo '<div class="alert alert-warning">Size ait bir IC sicil bulunamadı.</div>'; } else { ?>
								<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-align-justify"></span> IC Sicil</span>
								<hr style="margin: 0px; margin-bottom: 12px; background-color: #9898984d;">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col"><i class="fa fa-tag"></i> Tarih</th>
											<th scope="col">Memur</th>
											<th scope="col">Sebep</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($icsicil as $icsicilcek) { ?>
											<tr> 
												<th scope="row"><?php echo $icsicilcek['Tarih']; ?></th>
												<td><?php echo $icsicilcek['Memur']?></td>
												<td><span class="badge"><?php echo $icsicilcek['Sebep']; ?></span></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php } ?>

							</div>

							<div class="tab-pane fadeIn animated" id="birlik">



								<?php if ($birlik_count < 1) { echo '<div class="alert alert-warning">Bu karakter herhangi bir oluşumda değil!</div>'; } else { $birlik_karakter = $db->prepare("SELECT * FROM oyuncular WHERE birlik=:id");

										$birlik_karakter->execute(array('id' => $karaktercek['birlik']));  ?>



								<span style="font-weight: bold; font-size: 16px;"><span class="fa fa-users"></span> <?php echo $birlikcek['birlikAd']; ?></span>

								<br>

								<span style="font-weight: bold; font-size: 16px;">Seviye <?php echo $birlikcek['Level'] ?> Birlik</span>

								<br><br>

								<span class="fa fa-bullhorn"></span><span style="font-weight: bold; font-size: 16px;">

									Birlik Duyurusu: <?php echo $birlikcek['Duyuru']; ?></span>

								<hr style="margin: 0px; margin-bottom: 12px; background-color: #9898984d;">



								<table class="table table-bordered">

									<thead>

										<tr>

											<th>Karakter Adı</th>

											<th>Cinsiyet</th>

											<th>Can</th>

											<th>Zırh</th>

										</tr>

									</thead>

									<tbody>

										<?php 



										foreach ($birlik_karakter as $birlik_k_cek) {

											?>

											<tr>

												<td><?php echo $birlik_k_cek['isim']; ?></td>

												<td><?php if ($birlik_k_cek['Cinsiyet'] == 1) { echo 'Erkek'; } else { echo 'Kadın'; } ?></td>

												<td><?php $can = $birlik_k_cek['Can']; $exp1 = explode('.', $can); echo '<span data-toggle="tooltip" title="" data-original-title="'.$exp1[0].'"><div class="progress">

												<div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="'.$exp1[0].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$exp1[0].'%"></div>

											</div></span>'; ?></td>

											<td><?php $zirh = $birlik_k_cek['Zirh']; $exp2 = explode('.', $zirh); echo '<span data-original-title="'.$exp2[0].'"><div class="progress">

											<div class="progress-bar progress-bar-striped bg-secondary progress-bar-animated" role="progressbar" aria-valuenow="'.$exp2[0].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$exp2[0].'%"></div>

										</div></span>'; ?></td>

									</tr>

								<?php } ?>

							</tbody>

						</table>

					<?php } ?>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="col-xs-4 col-md-4" style="float: left;">

		<div class="card" style="background-color: #fff;">

			<center><img class="br64 mr15"  width="125" height="250" src="<?php if ($karaktercek['Kiyafet'] > 311) { echo 'http://weedarr.wdfiles.com/local--files/main-character-skins/0'; } else { echo 'http://weedarr.wdfiles.com/local--files/skinlistc/'.$karaktercek["Kiyafet"]; } ?>.png"></center>

			<div class="karakter_title"><center><?php echo str_replace("_"," ",$karaktercek['isim']); ?><font color="#f2b630"><?php if ($karaktercek['VIP'] == 1) {  echo '(VIP)'; } else { echo ''; } ?></font></center>

			</div>

			<div class="card-body">



				<div class="list-group">



					<a class="list-group-item d-flex justify-content-between align-items-center d-flex justify-content-between align-items-center">	

						<span style="font-weight: bold;  color: #000;">Oyuna Son Giriş</span>

						<span class="badge badge-primary badge-pill"><?php echo $karaktercek['oSonGiris']; ?></span>

					</a>



				</div>

			</div>

		</div>

	</div>



</div>



<script>

	$(document).ready(function(){

		$("[data-toggle=tooltip]").tooltip();

	});

</script>





<script>

	var url = document.location.toString();

	if (url.match('#')) {

		$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');

	} 



	$('.nav-tabs a').on('shown.bs.tab', function (e) {

		window.location.hash = e.target.hash;

	})

</script>

</div>

</div>

</div>



<?php include 'templates/footer.php'; ?>