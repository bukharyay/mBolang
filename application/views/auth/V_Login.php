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
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap');

		body {
			background-color: #EEEEEE;
		}

		p,
		span,
		label {
			font-family: 'Montserrat', sans-serif;
			color: #393E46;
		}

		h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: 'Poppins', sans-serif;
			font-weight: bold;
			color: #393E46;
		}

		.ratio {
			height: 300px;
			overflow: hidden;
		}

		.bg-img {
			transition: transform .5s ease;
		}

		.bg-img:hover {
			transform: scale(1.125);
		}

		div.ratio>a>div>h5 {
			color: #EEEEEE;
		}

		div.col-3>a>div>h5 {
			color: #EEEEEE;
		}
	</style>

</head>

<body>
	<div class="container pt-5">
		<div class="card mx-auto mt-5" style="width: 23rem;">
			<div class="card-body">
				<h3 class="card-title py-3 text-center"><?= $title; ?></h3>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Success!</strong> <?= strip_tags($this->session->flashdata('success')); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Warning!</strong> <?= strip_tags($this->session->flashdata('error')); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('error2')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Danger!</strong> <?= strip_tags($this->session->flashdata('error2')); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>
				<?php
				// $password = '12345';
				// $hash = password_hash($password, PASSWORD_BCRYPT);
				// echo $hash . '<br>';
				// echo $password;

				?>
				<form action="<?= base_url('Auth') ?>" method="POST">
					<div class="mb-3 mt-3">
						<label class="form-label">Email : </label>
						<input type="email" class="form-control <?= form_error('email') == true ? 'is-invalid' : '' ?> " name="email" id="email" placeholder="name@example.com" value="<?= set_value('email') ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Password : </label>
						<input type="password" class="form-control <?= form_error('password') == true ? 'is-invalid' : '' ?>" name="password" id="password">
					</div>
					<div class="mb-3 mt-4 text-center">
						<input type="submit" name="submit" class="btn btn-outline-success w-50" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

</body>

</html>
