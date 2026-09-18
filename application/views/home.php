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

	<!-- Custom Login Button Style -->
	<style>
		.btn-login-custom {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white !important;
			border-radius: 25px;
			padding: 10px 25px !important;
			margin-left: 15px;
			font-weight: 600;
			box-shadow: 0 4px 15px rgba(102,126,234,0.4);
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
			border: none;
		}
		.btn-login-custom::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
			transition: left 0.5s ease;
		}
		.btn-login-custom:hover {
			transform: translateY(-3px) scale(1.05);
			box-shadow: 0 8px 25px rgba(102,126,234,0.6);
			color: white !important;
		}
		.btn-login-custom:hover::before {
			left: 100%;
		}
		.btn-login-custom:active {
			transform: translateY(-1px) scale(1.02);
		}
		.btn-login-custom i {
			margin-right: 8px;
			transition: transform 0.3s ease;
		}
		.btn-login-custom:hover i {
			transform: translateX(3px);
		}
	</style>

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
		<header id="header" class="header-transparent header-effect-shrink"
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
													<a data-hash class="dropdown-item " href="#home">
														Home
													</a>
												</li>
												<li>
													<a class="dropdown-item" data-hash data-hash-offset="68"
														href="#profile">Profile</a>
												</li>
												<li>
													<a class="dropdown-item" data-hash data-hash-offset="68"
														href="#alur">Alur Pelayanan</a>
												</li>
												<li>
													<a class="dropdown-item" data-hash data-hash-offset="68"
														href="#demos">Ruang Lingkup Pelayanan</a>
												</li>
												<li>
													<a class="dropdown-item" data-hash data-hash-offset="68"
														href="#footer">Contact Us</a>
												</li>
												<li>
									<a class="dropdown-item btn-login-custom" href="<?= base_url('auth'); ?>">
										<i class="fas fa-sign-in-alt"></i> Login
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

		<div role="main" class="main">
			<div id="home"
				class="slider-container rev_slider_wrapper appear-animation animated fadeIn appear-animation-visible"
				data-appear-animation="fadeIn" style="animation-delay: 100ms;" style="height: 670px;">
				<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
					data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
					<ul>
						<li data-transition="fade">
							<img src="<?= base_url('assets/homepage/')?>img/slides/<?= $data_profil[0]['header_img']; ?>"
								alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
								class="rev-slidebg">



							<div class="tp-caption tp-resizeme rs-parallaxlevel-7"
								data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"opacity:0;x:-50%;y:-50%;","to":"opacity:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								data-type="image" data-x="-500" data-y="-700" data-width="['auto']"
								data-height="['auto']" data-basealign="slide"><img
									src="<?= base_url('assets/homepage/')?>img/slides/slide-parallax-porto-symbol2.png"
									alt=""></div>

							<div class="tp-caption" data-x="center" data-hoffset="['-150','-150','-150','-240']"
								data-y="center" data-voffset="['-50','-50','-50','-75']" data-start="1000"
								data-transform_in="x:[-300%];opacity:0;s:500;" data-transform_idle="opacity:0.2;s:500;">
								<img src="<?= base_url('assets/homepage/')?>img/slides/slide-title-border.png" alt="">
							</div>

							<div class="tp-caption text-color-light font-weight-normal" data-x="center" data-y="center"
								data-voffset="['-50','-50','-50','-75']" data-start="700"
								data-fontsize="['22','22','22','40']" data-lineheight="['25','25','25','45']"
								data-transform_in="y:[-50%];opacity:0;s:500;"><?= $data_profil[0]['header1']; ?></div>

							<div class="tp-caption d-none d-md-block"
								data-frames='[{"delay":2400,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								data-x="center" data-hoffset="['80','80','80','135']" data-y="center"
								data-voffset="['-33','-33','-33','-55']"><img
									src="<?= base_url('assets/homepage/')?>img/slides/slide-blue-line.png" alt=""></div>

							<div class="tp-caption" data-x="center" data-hoffset="['150','150','150','240']"
								data-y="center" data-voffset="['-50','-50','-50','-75']" data-start="1000"
								data-transform_in="x:[300%];opacity:0;s:500;" data-transform_idle="opacity:0.2;s:500;">
								<img src="<?= base_url('assets/homepage/')?>img/slides/slide-title-border.png" alt="">
							</div>

							<div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
								data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								data-x="center" data-y="center" data-fontsize="['50','50','50','90']"
								data-lineheight="['55','55','55','95']"><?= $data_profil[0]['header2']; ?></div>

							<div class="tp-caption font-weight-light"
								data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
								data-x="center" data-y="center" data-voffset="['40','40','40','80']"
								data-fontsize="['18','18','18','50']" data-lineheight="['20','20','20','55']"
								style="color: #b5b5b5;"><?= $data_profil[0]['header3']; ?></div>

						</li>
					</ul>
				</div>
			</div>
			<div class="home-intro" id="home-intro">
				<div class="container">

					<div class="row align-items-center">
						<div class="col text-center">
							<p class="mb-0">
								<?= $data_profil[0]['header4']; ?> <span
									class="highlighted-word highlighted-word-animation-1 text-color-primary font-weight-semibold text-5">Semarang
									Hebat</span>
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="container mt-5" id="profile">
				<div class="row py-4 mb-2">
					<div class="col-md-7 order-2">
						<div class="overflow-hidden">
							<h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation"
								data-appear-animation="maskUp" data-appear-animation-delay="300">
								<?= $data_profil[0]['judul_profil']; ?></h2>
						</div>
						<div class="overflow-hidden mb-3">
							<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation"
								data-appear-animation="maskUp" data-appear-animation-delay="500">Profile</p>
						</div>
						<p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="700"><?= $data_profil[0]['desk_profil1']; ?></p>
						<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="800"><?= $data_profil[0]['desk_profil2']; ?>
						</p>
						<div class="toggle toggle-primary toggle-simple m-0" data-plugin-toggle="">
							<section class="toggle mt-0">
								<a class="toggle-title">VISI</a>
								<div class="toggle-content">
									<p><?= $data_profil[0]['visi']; ?></p>
								</div>
							</section>
							<section class="toggle">
								<a class="toggle-title">MISI</a>
								<div class="toggle-content">
									<p><?= nl2br($data_profil[0]['misi']); ?></p>
								</div>
							</section>
						</div>
						<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="900">
					</div>
					<div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation d-none d-lg-block"
						data-appear-animation="fadeInRightShorter">
						<img src="<?= base_url('assets/homepage/')?>img/logo.png" class="img-fluid mb-2" width="100%"
							alt="">
					</div>
					<div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation d-block d-lg-none text-center"
						data-appear-animation="fadeInRightShorter">
						<img src="<?= base_url('assets/homepage/')?>img/logo.png" class="img-fluid mb-2" width="50%"
							alt="">
					</div>
				</div>
			</div>
			<div class="row text-center pt-3" id="alur">
				<div class="col-md-10 mx-md-auto">
					<h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation"
						data-appear-animation="fadeInUpShorter">
						<span><?= $data_profil[0]['alur_pelayanan']; ?></span>
						<span class="word-rotator-words bg-dark">
							<b class="is-visible">Cepat</b>
							<b>Tepat</b>
							<b>Akurat</b>
						</span>
					</h1>
					<p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
						data-appear-animation-delay="300">
						<?= $data_profil[0]['desk_alur']; ?> <a href="<?= base_url('assets/alur.pdf')?>" target="_blank"
							class="btn btn-info"><i class="fas fa-download"></i> Download
							File</a>
					</p>
				</div>
			</div>

		</div>

		<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
			<div class="home-concept mt-5">
				<div class="container">

					<div class="row text-center">
						<span class="sun"></span>
						<span class="cloud"></span>
						<div class="col-lg-2 ml-lg-auto">
							<div class="process-image">
								<img src="<?= base_url('assets/homepage/')?>img/home/home-concept-item-1alur.png"
									alt="" />
								<strong>Mengisi form pendaftaran</strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image process-image-on-middle">
								<img src="<?= base_url('assets/homepage/')?>img/home/home-concept-item-2alur.png"
									alt="" />
								<strong>Verifikasi UTTP</strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image">
								<img src="<?= base_url('assets/homepage/')?>img/home/home-concept-item-3alur.png"
									alt="" />
								<strong>Menerbitkan Surat Keterangan Hasil Pengujian / Sertifikat Kalibrasi
								</strong>
							</div>
						</div>
						<div class="col-lg-4 ml-lg-auto">
							<div class="project-image">
								<div id="fcSlideshow" class="fc-slideshow">
									<ul class="fc-slides">
										<li><a><img class="img-responsive"
													src="<?= base_url('assets/homepage/')?>img/projects/project-home-1alur.jpg"
													alt="" /></a></li>
										<li><a><img class="img-responsive"
													src="<?= base_url('assets/homepage/')?>img/projects/project-home-2alur.jpg"
													alt="" /></a></li>
									</ul>
								</div>
								<strong class="our-work">Mengembalikan kepada pemilik. Selesai
								</strong>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>



		<div class="container mt-5" id="demos">
			<div class="row text-center pt-3">
				<div class="col-md-10 mx-md-auto">
					<h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation"
						data-appear-animation="fadeInUpShorter">
						<span><?= $data_profil[0]['ruang']; ?></span>
					</h1>
					<p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
						data-appear-animation-delay="300">
						<?= $data_profil[0]['desk_ruang']; ?> <a
							href="<?= base_url('assets/Perda Semarang No 1 - 2017.pdf')?>" target="_blank"
							class="btn btn-info"><i class="fas fa-download"></i> Download
							File</a>
					</p>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-2"></div>
				<div class="col-8">
					<form action="<?= base_url('home/pencarian');?>" method="POST">
						<div class="input-group">

							<select class="form-control select2" name="id_pencarian" required>
								<option value="">Pencarian tarif dan ruang lingkup pelayanan</option>
								<?php foreach($data_kategori as $key): ?>
								<option value="<?= $key['id_kategori']; ?>"><?= $key['nama_kategori']; ?>
								</option>
								<?php endforeach; ?>
							</select>
							<span class="input-group-append">
								<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
							</span>

						</div>
					</form>
				</div>
				<div class="col-2"></div>
			</div>
			<div class="text-center mb-5 appear-animation animated fadeIn appear-animation-visible"
				data-appear-animation="fadeIn" data-appear-animation-delay="400" data-appear-animation-duration="750"
				style="animation-delay: 400ms;">
				<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center mb-0"
					data-sort-id="portfolio" data-option-key="filter"
					data-plugin-options="{'layoutMode': 'masonry', 'filter': '*', 'useHash': false}">
					<li class="nav-item active" data-option-value="*"><a class="nav-link custom-nav-link active"
							href="#">Show All</a></li>
					<li class="nav-item" data-option-value=".classic"><a class="nav-link custom-nav-link" href="#">Massa
							Timbangan</a></li>
					<li class="nav-item" data-option-value=".blog"><a class="nav-link custom-nav-link"
							href="#">Volume</a>
					</li>
					<li class="nav-item" data-option-value=".onepage"><a class="nav-link custom-nav-link"
							href="#">Panjang dan Tekanan</a></li>
					<li class="nav-item" data-option-value=".business"><a class="nav-link custom-nav-link"
							href="#">Meter Kadar Air</a></li>
				</ul>
			</div>
			<div class="row portfolio-list sort-destination overflow-visible" data-sort-id="portfolio" data-filter="*"
				style="position: relative; height: 3695.15px;">

				<?php foreach($data_timbangan as $data): ?>
				<div class="col-sm-6 col-md-4 col-lg-3 isotope-item classic"
					style="position: absolute; left: 0px; top: 0px;">
					<div class="appear-animation animated fadeInUpShorter appear-animation-visible"
						data-appear-animation="fadeInUpShorter" data-appear-animation-delay=""
						data-appear-animation-duration="750" style="animation-delay: 100ms;">
						<div class="portfolio-item hover-effect-1 text-center">
							<a href="#modal<?= $data['id_kategori']?>" data-toggle="modal">
								<span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
									<span class="thumb-info-wrapper thumb-info-wrapper-demos m-0">
										<img src="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											data-plugin-lazyload=""
											data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}"
											data-original="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											width="350" height="259" class="img-fluid lazy-load-loaded" alt=""
											style="animation-duration: 1s;">
									</span>
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Lihat</span>
										<span class="thumb-info-type">Tarif</span>
									</span>
								</span>
							</a>
							<h5 class="text-color-dark text-capitalize mt-3"><?= $data['nama_kategori']; ?></h5>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php foreach($data_volume as $data): ?>
				<div class="col-sm-6 col-md-4 col-lg-3 isotope-item blog"
					style="position: absolute; left: 0px; top: 0px;">
					<div class="appear-animation animated fadeInUpShorter appear-animation-visible"
						data-appear-animation="fadeInUpShorter" data-appear-animation-delay=""
						data-appear-animation-duration="750" style="animation-delay: 100ms;">
						<div class="portfolio-item hover-effect-1 text-center">
							<a href="#modal<?= $data['id_kategori']?>" data-toggle="modal">
								<span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
									<span class="thumb-info-wrapper thumb-info-wrapper-demos m-0">
										<img src="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											data-plugin-lazyload=""
											data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}"
											data-original="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											width="350" height="259" class="img-fluid lazy-load-loaded" alt=""
											style="animation-duration: 1s;">
									</span>
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Lihat</span>
										<span class="thumb-info-type">Tarif</span>
									</span>
								</span>
							</a>
							<h5 class="text-color-dark text-capitalize mt-3"><?= $data['nama_kategori']; ?></h5>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php foreach($data_panjang as $data): ?>
				<div class="col-sm-6 col-md-4 col-lg-3 isotope-item onepage"
					style="position: absolute; left: 0px; top: 0px;">
					<div class="appear-animation animated fadeInUpShorter appear-animation-visible"
						data-appear-animation="fadeInUpShorter" data-appear-animation-delay=""
						data-appear-animation-duration="750" style="animation-delay: 100ms;">
						<div class="portfolio-item hover-effect-1 text-center">
							<a href="#modal<?= $data['id_kategori']?>" data-toggle="modal">
								<span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
									<span class="thumb-info-wrapper thumb-info-wrapper-demos m-0">
										<img src="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											data-plugin-lazyload=""
											data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}"
											data-original="<?= base_url('assets/homepage/')?>img/timbangan/<?= $data['gambar']; ?>"
											width="350" height="259" class="img-fluid lazy-load-loaded" alt=""
											style="animation-duration: 1s;">
									</span>
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Lihat</span>
										<span class="thumb-info-type">Tarif</span>
									</span>
								</span>
							</a>
							<h5 class="text-color-dark text-capitalize mt-3"><?= $data['nama_kategori']; ?></h5>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php foreach($data_kadar_air as $data): ?>
				<div class="col-sm-6 col-md-4 col-lg-3 isotope-item business"
					style="position: absolute; left: 0px; top: 0px;">
					<div class="appear-animation animated fadeInUpShorter appear-animation-visible"
						data-appear-animation="fadeInUpShorter" data-appear-animation-delay=""
						data-appear-animation-duration="750" style="animation-delay: 100ms;">
						<div class="portfolio-item hover-effect-1 text-center">
							<a href="#modals<?= $data['id_jenis']?>" data-toggle="modal">
								<span class="thumb-info thumb-info-no-zoom thumb-info-no-overlay thumb-info-no-bg">
									<span class="thumb-info-wrapper thumb-info-wrapper-demos m-0">
										<img src="<?= base_url('assets/homepage/')?>img/timbangan/alatukurbiji.jpg"
											data-plugin-lazyload=""
											data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}"
											data-original="<?= base_url('assets/homepage/')?>img/timbangan/alatukurbiji.jpg"
											width="350" height="259" class="img-fluid lazy-load-loaded" alt=""
											style="animation-duration: 1s;">
									</span>
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Lihat</span>
										<span class="thumb-info-type">Tarif</span>
									</span>
								</span>
							</a>
							<h5 class="text-color-dark text-capitalize mt-3"><?= $data['nama_jenis']; ?></h5>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php $this->load->model('model_posting', 'posting'); ?>

				<?php foreach($data_kategori as $data): 
							$data_jenis = $this->posting->data_jenis($data['id_kategori']);
					?>
				<div class="modal fade" id="modal<?= $data['id_kategori']?>" tabindex="-1" role="dialog"
					aria-labelledby="largeModalLabel" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="largeModalLabel"><?= $data['nama_kategori']; ?></h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<div class="table-responsive mt-3 mb-3">
									<table class="table table-bordered table-striped table-responsive" width="100%">
										<thead>
											<tr class="text-center">

												<th rowspan="2" width="700px">Nama Jenis</th>
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

												<td colspan="6" class="text-left" width="70%">
													<?= $data['nama_jenis']; ?></td>

												<?php else: ?>

												<td class="text-left" width="50%"><?= $data['nama_jenis']; ?></td>
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
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

				<?php foreach($data_kadar_air as $data): 
							
					?>
				<div class="modal fade" id="modals<?= $data['id_jenis']?>" tabindex="-1" role="dialog"
					aria-labelledby="largeModalLabel" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="largeModalLabel"><?= $data['nama_kategori']; ?></h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<div class="table-responsive mt-3 mb-3">
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
											<tr>
												<td class="text-left" width="400px"><?= $data['nama_jenis']; ?></td>
												<td class="text-center"><?= $data['satuan_jenis']; ?></td>
												<td class="text-right"><?= $data['jt_tarif_kantor']; ?></td>
												<td class="text-right"><?= $data['jt_tarif_tpakai']; ?></td>
												<td class="text-right"><?= $data['jtu_kantor']; ?></td>
												<td class="text-right"><?= $data['jtu_tpakai']; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
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
							<span
								class="text-color-light d-block text-2 p-relative bottom-3"><?= $data_profil[0]['alamat_kantor']; ?></span>
						</p>
					</div>
					<div class="col-md-3 text-center mb-4 mb-md-0">
						<i class="far fa-clock text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Jam Kerja</strong>
							<span
								class="text-color-light d-block text-2 p-relative bottom-3"><?= $data_profil[0]['jam_kerja']; ?></span>
						</p>
					</div>
					<div class="col-md-3 text-center">
						<i class="fas fa-phone-volume text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Telpon Kantor</strong>
							<span
								class="text-color-light d-block text-2 p-relative bottom-3"><?= $data_profil[0]['telpon_kantor']; ?></span>
						</p>
					</div>
					<div class="col-md-3 text-center">
						<i class="fas fa-envelope text-9 text-color-light mb-3 mt-2"></i>
						<p class="mb-0">
							<strong class="text-color-light text-uppercase">Email Kantor</strong>
							<span
								class="text-color-light d-block text-2 p-relative bottom-3"><?= $data_profil[0]['email_kantor']; ?></span>
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
							<li class="social-icons-facebook"><a href="<?= $data_profil[0]['facebook']; ?>"
									target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li class="social-icons-twitter"><a href="<?= $data_profil[0]['twitter']; ?>"
									target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
							<li class="social-icons-instagram"><a href="<?= $data_profil[0]['instagram']; ?>"
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
