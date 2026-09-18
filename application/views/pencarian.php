<!DOCTYPE html>
<html>

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?= $app; ?> - <?= $title; ?></title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets/homepage/')?>img/logo.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400"
		rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/animate/animate.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/homepage/')?>vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/homepage/')?>vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/theme.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/theme-elements.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/theme-blog.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/rs-plugin/css/navigation.css">
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>vendor/circle-flip-slideshow/css/component.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/skins/default.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/homepage/')?>css/custom.css">

	<!-- Head Libs -->
	<script src="<?= base_url('assets/homepage/')?>vendor/modernizr/modernizr.min.js"></script>

</head>

<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay
	data-plugin-options="{'hideDelay': 500}">
	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>

	<div class="body">
		<header id="header" class="header-effect-shrink"
			data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
			<div class="header-body border-top-0 bg-dark box-shadow-none">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="<?= base_url();?>">
										<img alt="Metrologi Kota Semarang" width="40" height="40"
											src="<?= base_url('assets/homepage/')?>img/logo.png">
									</a>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<div
									class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
									<div
										class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<ul class="nav nav-pills" id="mainNav">
												<li class="dropdown">
													<a data-hash class="dropdown-item " href="<?= base_url('home')?>">
														Home
													</a>
												</li>

											</ul>
										</nav>
									</div>
									<button class="btn header-btn-collapse-nav" data-toggle="collapse"
										data-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div role="main" class="main" style="margin-top:-20px;">
			<section class="page-header page-header-classic">
				<div class="container">
					<div class="row">
						<div class="col">
							<ul class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="active"><?= $title; ?></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col p-static">
							<h1 data-title-border><?= $class3; ?></h1>

						</div>
					</div>
				</div>
			</section>

			<div class="container">
				<div class="row">
					<div class="col">
						<section class="card card-admin">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">TARIF DAN LAYANAN</h2>
							</header>
							<div class="card-body ">
								<div class="table-responsive">
									<table id="tabel1" class="table table-bordered table-striped">
										<thead>
											<tr class="text-center">

												<th rowspan="2">Nama Jenis</th>
												<th rowspan="2">Satuan</th>
												<th colspan="2">Tera</th>
												<th colspan="2">Tera Ulang</th>
											</tr>
											<tr>
												<th>Kantor</th>
												<th>Tempat Pakai</th>
												<th>Kantor</th>
												<th>Tempat Pakai</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; $d=0; foreach($data_jenis as $data): ?>
											<tr>
												<?php if($data['satuan_jenis'] == ''): ?>

												<td colspan="6" class="text-left" width="400px">
													<?= $data['nama_jenis']; ?></td>

												<?php else: ?>

												<td class="text-left" width="400px"><?= $data['nama_jenis']; ?></td>
												<td class="text-center"><?= $data['satuan_jenis']; ?></td>
												<td class="text-right">
													<?= number_format($data['jt_tarif_kantor'],0,',',','); ?></td>
												<td class="text-right">
													<?= number_format($data['jt_tarif_tpakai'],0,',',','); ?></td>
												<td class="text-right">
													<?= number_format($data['jtu_kantor'],0,',',','); ?>
												</td>
												<td class="text-right">
													<?= number_format($data['jtu_tpakai'],0,',',','); ?>
												</td>

												<?php endif; ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>

							</div>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<section class="card card-admin">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Biaya Pengujian</h2>
							</header>
							<div class="card-body">
								<div class="table-responsive">
									<table id="tabel1" class="table table-bordered table-striped">
										<thead>

											<tr>
												<th>No</th>
												<th>Keterangan</th>
												<th>Kantor</th>
												<th>Tempat Pakai</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td width="50px">1.</td>
												<td class="text-left" width="700px">Selain UTTP tersebut pd huruf A
													angka
													1 sampai
													dengan 22 atau benda/barang bukan UTTP dihitung berdasarkan lamanya
													pengujian
												</td>
												<td class="text-right">10,000
												</td>
												<td class="text-right">20,000
												</td>
											</tr>
											<tr>
												<td width="50px" rowspan="3">2.</td>
												<td class="text-left" width="700px" colspan="3">BDKT
												</td>
											</tr>
											<tr>
												<td class="text-left" width="700px">Pengujian dilakukan per jenis BDKT
													per
													isi nominal untuk tiap jam bagian dari jam diitung 1 jam

												</td>
												<td class="text-right">25,000

												</td>
												<td class="text-right">25,000

												</td>
											</tr>
											<tr>
												<td class="text-left" width="700px">Biaya Penelitian dalamrangka ijin
													tanda
													pabrik ata pengukuran atau penimbangan lainnya yang jenisnya
													tercantum
													pada poin A
												</td>
												<td class="text-right">20,000

												</td>
												<td class="text-right">20,000

												</td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<section class="card card-admin">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Biaya Kalibrasi</h2>
							</header>
							<div class="card-body">
								<div class="table-responsive">
									<table id="tabel1" class="table table-bordered table-striped">
										<thead>

											<tr>
												<th>No</th>
												<th>Keterangan</th>
												<th>Kantor</th>
												<th>Tempat Pakai</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td width="50px">1.</td>
												<td class="text-left" width="700px">Untuk UTTP tersebut pada huruf A
													sampai dengan 22 dasar tarif adalah tarif tera

												</td>
												<td class="text-right">300% biaya tera kantor
												</td>
												<td class="text-right">300% biaya tera di tempat pakai

												</td>
											</tr>
											<tr>
												<td width="50px">2.</td>
												<td class="text-left" width="700px">Selain UTTP tersebut pd huruf A
													angka 1
													sampai dengan 22 dasar tarif adalah tarif pengujian

												</td>
												<td class="text-right">300% biaya pengujian

												</td>
												<td class="text-right">300% biaya pengujian


												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>

		</div>
	</div>
	<footer id="footer">
		<div class="container ">
			<div class="row justify-content-center py-4 text-center">
				<div class="col">
					<a class="text-uppercase font-weight-bold text-3 text-color-light icon-aria-expanded-change"
						data-toggle="collapse" href="#hiddenMap" role="button" aria-expanded="false"
						aria-controls="hiddenMap">Lihat Maps <i class="ml-1 fas fa-chevron-down"></i><i
							class="ml-1 fas fa-chevron-up"></i></a>
				</div>
			</div>
		</div>
		<div class="collapse" id="hiddenMap">
			<div id="googlemaps" class="google-map map-style-1 m-0" style="height: 475px;">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.211353199338!2d110.415397!3d-6.973553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8848de0733f57a6f!2sUPTD%20Metrologi%20Legal%20Kota%20Semarang!5e0!3m2!1sen!2sid!4v1654014952462!5m2!1sen!2sid"
					width="100%" height="100%" frameborder="0" style="border:0"></iframe>

			</div>
		</div>
		<div class="footer-bg-color-2 footer-bottom-light-border">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col py-5">
						<a href="<?= base_url()?>" class="logo">
							<img alt="PEMKOT SEMARANG" src="<?= base_url('assets/')?>img/pemkot.png" height="100">
							<img alt="Metrologi Kota Semarang" src="<?= base_url('assets/homepage/')?>img/logo.png"
								height="100">

						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bg-color-2 footer-bottom-light-border">
			<div class="container">
				<div class="row justify-content-center text-center py-5">
					<div class="col-md-3 text-center mb-4 mb-md-0">
						<i class="fas fa-map-marker-alt text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Alamat Kantor</strong>
							<span class="text-color-light d-block text-2 p-relative bottom-3">Jl. Imam Bonjol No.110,
								Pandansari, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50139</span>
						</p>
					</div>
					<div class="col-md-3 text-center mb-4 mb-md-0">
						<i class="far fa-clock text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Jam Kerja</strong>
							<span class="text-color-light d-block text-2 p-relative bottom-3">Senin s/d Kamis Pukul
								08:00 -
								14:00 WIB & Jumat Pukul 08.00 - 12.30 WIB</span>
						</p>
					</div>
					<div class="col-md-3 text-center">
						<i class="fas fa-phone-volume text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Telpon Kantor</strong>
							<span class="text-color-light d-block text-2 p-relative bottom-3">(024) 3544946</span>
						</p>
					</div>
					<div class="col-md-3 text-center">
						<i class="fas fa-envelope text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Email Kantor</strong>
							<span
								class="text-color-light d-block text-2 p-relative bottom-3">metrologisemarang@gmail.com</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container py-2">
				<div class="row py-4">
					<div class="col text-center">
						<ul class="footer-social-icons social-icons social-icons-clean social-icons-icon-light mb-3">
							<li class="social-icons-facebook"><a
									href="https://www.facebook.com/UPTD-Metrologi-Legal-Kota-Semarang-1500356629998932/"
									target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li class="social-icons-twitter"><a href="https://twitter.com/metrologismg" target="_blank"
									title="Twitter"><i class="fab fa-twitter"></i></a></li>
							<li class="social-icons-instagram"><a
									href="https://www.instagram.com/metrologidisdagsmg/?igshid=YmMyMTA2M2Y="
									target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
						</ul>
						<p>© Copyright 2022. Metrologi Kota Semarang.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<!-- Vendor -->
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.appear/jquery.appear.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.cookie/jquery.cookie.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/popper/umd/popper.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/common/common.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.validation/jquery.validate.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/isotope/jquery.isotope.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/vide/jquery.vide.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/vivus/vivus.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?= base_url('assets/homepage/')?>js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="<?= base_url('assets/homepage/')?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
	<script src="<?= base_url('assets/homepage/')?>js/views/view.home.js"></script>

	<!-- Theme Custom -->
	<script src="<?= base_url('assets/homepage/')?>js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="<?= base_url('assets/homepage/')?>js/theme.init.js"></script>
	<script src="<?= base_url('assets/')?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?= base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

	<script src="<?= base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>

	<script>
		$(document).ready(function () {
			$('.select2').select2({
				theme: 'bootstrap4'
			})
			$("#tabel1").DataTable();
		});

	</script>
</body>

</html>
