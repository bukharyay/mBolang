<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>

	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<meta name="description" content="">
	<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
	<link rel="canonical" href="<?= base_url() ?>">
	<meta property="og:locale" content="id_ID">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Website apa yoo">
	<meta property="og:description" content="">
	<meta property="og:url" content="<?= base_url() ?>">
	<meta property="og:site_name" content="Code Light">
	<meta property="og:image" content="<?= base_url('/assets/m-Bolang.ico') ?>">
	<meta property="og:image:secure_url" content="<?= base_url('/assets/m-Bolang.ico') ?>">
	<meta property="og:image:width" content="512">
	<meta property="og:image:height" content="512">
	<meta property="og:image:alt" content="jasa pembuatan website perusahaan">
	<meta property="og:image:type" content="image/png">


	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap');

		body {
			background-color: #EEEEEE;
		}

		a,
		p,
		span,
		label {
			font-family: 'Montserrat', sans-serif !important;
			color: #393E46;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Poppins', sans-serif !important;
			font-weight: bold !important;
			color: #393E46 !important;
		}



		.ratio {
			height: auto;
			overflow: hidden;
		}

		.bg-img {
			transition: transform .5s ease;
		}

		.bg-img:hover {
			transform: scale(1.125);
		}

		div.ratio>a>div>h5,
		div.col-3>a>div>h5 {
			color: #EEEEEE;
		}

		nav.navbar {
			border-radius: 1rem !important;
			padding: 20px !important;
		}

		.swiper-button-prev:after,
		.swiper-rtl .swiper-button-next:after {
			content: 'prev';
			color: #EEEEEE;

		}

		.swiper-button-next:after,
		.swiper-rtl .swiper-button-prev:after {
			content: 'next';
			color: #EEEEEE;

		}

		div>div>div.swiper-button-next:after,
		.swiper-rtl .swiper-button-next:after {
			content: 'next';
			color: #393E46;

		}

		div>div>div>div.swiper-button-prev:after,
		.swiper-rtl .swiper-button-prev:after {
			content: 'prev';
			color: #393E46;

		}
	</style>

</head>

<body>
	<div class="container sticky-top" style="top: 20px !important;">
		<nav class="navbar navbar-expand-lg bg-white rounded-pill">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="<?= base_url('assets/m-Bolang.ico') ?>" alt="" width="150" height="150" style="position: absolute;top: -35px;">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<style>
				.navbar-nav .nav-link.active,
				.navbar-nav .show>.nav-link {
					color: var(--bs-navbar-active-color);
					border-bottom: 2px solid;
				}
			</style>
			<div class="collapse navbar-collapse me-1" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Selamat Datang' ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('Selamat-Datang'); ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Daerah' ? 'active' : ''; ?>" href="<?= base_url('Daerah'); ?>">Daerah</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Wisata' ? 'active' : ''; ?> " href="<?= base_url('Wisata'); ?>">Wisata</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Kuliner' ? 'active' : ''; ?>" href="<?= base_url('Kuliner'); ?>">Kuliner</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Budaya' ? 'active' : ''; ?>" href="<?= base_url('Budaya'); ?>">Budaya</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $title == 'Kerajinan' ? 'active' : ''; ?>" href="<?= base_url('Kerajinan'); ?>">Kerajinan</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
