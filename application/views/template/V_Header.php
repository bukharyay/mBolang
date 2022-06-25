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

	<!-- Datatables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />

</head>

<style>
	.nav-pills .nav-link {
		background: 0 0;
		border: 1px solid #FCEC52 !important;

	}

	.nav {
		--bs-nav-link-color: var(--bs-link-color);
		--bs-nav-link-hover-color: var(--bs-link-hover-color);
		--bs-nav-link-disabled-color: #6c757d;

	}

	.nav-pills {
		--bs-nav-pills-border-radius: 0.375rem;
		--bs-nav-pills-link-active-color: #fff;
		--bs-nav-pills-link-active-bg: #FCEC52 !important;

	}
</style>

<body>


	<div class="container-fluid">
		<nav class="navbar bg-light fixed-top ">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="#"> <?= $idDaerah['id_kota'] == 0 ? $idDaerah['name_kota'] : $idDaerah['name_kota'] ?></a>
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<?= $this->session->userdata('name_user') ?>
					<img src="<?= base_url('assets/user/') . $this->session->userdata('avatar') ?>" width="60" height="60" class="rounded-circle" alt="...">
				</a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="<?= $this->session->userdata('id_role') == 1 ?  base_url('admin') : base_url('user') ?>">Dashboard</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
				</ul>
				<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h1></h1>
						<img src="<?= base_url('assets/m-Bolang.ico') ?>" alt="" width="200" height="200">
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div class="d-flex flex-column  align-items-center bg-white">
							<div class="nav flex-column nav-pills " aria-orientation="vertical">
								<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>" href="<?= $this->session->userdata('id_role') == 1 ?  base_url('admin') : base_url('user') ?>"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard </a>
								<?php if ($this->session->userdata('id_role') == 1) : ?>
									<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'User' ? 'active' : ''; ?>" href="<?= base_url('admin/user'); ?>"><i class="fas fa-fw fa-users"></i> User </a>
									<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Daerah' ? 'active' : ''; ?>" href="<?= base_url('admin/daerah'); ?>"> <i class="fas fa-fw fa-map-marked-alt"></i> Daerah </a>
								<?php endif; ?>
								<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Budaya' ? 'active' : ''; ?>" href="<?= base_url('user/budaya'); ?>"> <i class="fas fa-fw fa-theater-masks"></i> Budaya </a>
								<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Kerajinan' ? 'active' : ''; ?>" href="<?= base_url('user/kerajinan'); ?>"> <i class="fas fa-fw fa-hand-sparkles"></i> Kerajinan </a>
								<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Wisata' ? 'active' : ''; ?>" href="<?= base_url('user/wisata'); ?>"> <i class="fas fa-fw fa-umbrella-beach"></i> Wisata </a>
								<a class="flex-fill mb-2  text-dark nav-link <?= $title == 'Kuliner' ? 'active' : ''; ?>" href="<?= base_url('user/kuliner'); ?>"><i class="fas fa-fw fa-utensils"></i> Kuliner </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="row mt-5">
			<div class="col px-0">
				<div class="container">
					<div class="row">
						<div class="content py-5 bg-white">
							<h3 class="mb-3"><?= $title; ?></h3>
