<div class="p-5 mb-4 rounded-3" style="margin-top: -6rem;
    padding-top: 13rem !important;
    padding-bottom: 9rem !important; 
	background: #b1e0e6 !important; 
	">
	<!-- style="background: url('<?= base_url('assets/mbolang background.png') ?>') no-repeat 100% 50%!important;     padding-bottom: 8rem !important;" -->
	<div class="container">
		<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
			<div class="col-lg-6 col-sm-12 order-sm-1 order-md-2 mb-4 ">
				<img src="<?= base_url('assets/mbolang background.png') ?> " class=" bg-img rounded w-100 h-100 top-0 ">
			</div>
			<div class="col-lg-6 col-sm-12 order-sm-2 order-md-1 mb-4 ">
				<h1 class="display-5 fw-bold">m-Bolang Pedia</h1>
				<p class="col-md-8 fs-4">Kamus lengkap informasi wisata, kuliner, budaya serta kerajinan se-Indonesia, bikin kamu makin cinta Indonesia!</p>
				<a href="#daerah" class="btn btn-primary btn-lg" type="button">Pilih Destinasi Kunjunganmu <i class="fas fa-angle-double-right"></i></a>
			</div>

		</div>
	</div>
</div>

<div class="container my-5 ">
	<h5 id="daerah" class=" text-center">Tentang Kami </h5>

	<p id="" class="text-center">m-Bolang Pedia adalah website penyedia informasi seputar ciri khas suatu daerah di Indonesia yang bertujuan untuk meningkatkan potensi perekonomian daerah serta pelaku usaha kecil dan menengah.</p>
</div>
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<h5 id="" class=" text-center mb-3"><strong>Destinasi Daerah</strong></h5>
<div class="swiper swiper2">
	<div class="swiper-wrapper">
		<?php foreach ($daerah as $da) : ?>
			<?php if ($da['id_kota'] != 0) : ?>
				<div class="shadow ratio ratio-1x1 swiper-slide mt-4 mb-5 ">
					<a class="bg-img " href="<?= base_url('Daerah/') . $da['id_kota'] ?>">
						<img src="<?= base_url('assets/daerah/') . $da['image_kota'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class=" d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $da['name_kota'] ?></h6>
						</div>
					</a>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-pagination" style="bottom: 0 !important; ;"></div>
</div>
<div class="text-center mt-3">
	<p>Yuk, Jelajah Destinasi Seru Lainnya!</p>
	<a class="btn btn-primary text-bold" href="<?= base_url('Daerah') ?>"><strong>EXPLORE NOW</strong></a>
</div>

<div class="container my-5">
	<hr>
</div>

<div class="container ">
	<h5 id="" class=" text-center mb-5"><strong>Inspirasi Tamasya</strong></h5>
	<div class="row row-cols-sm-2 row-cols-md-4 justify-content-center">
		<?php $a = 1; ?>
		<?php foreach ($wisata as $ws) : ?>
			<?php if ($a > 0 && $a <= 8) : ?>
				<?php $a++ ?>
				<div class="col-sm-8 col-md-3 mb-4 ">
					<div class="shadow ratio ratio-1x1 ">
						<a class="bg-img " href="<?= base_url('Wisata/') . $ws['id_wisata'] ?>">
							<img src="<?= base_url('assets/wisata/') . $ws['image_wisata'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
							<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
								<h6 class="text-white"><?= $ws['name_wisata'] ?></h6>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

<div class="container my-5">
	<hr>
</div>

<h5 id="" class=" text-center mb-5"><strong>Berburu Kuliner</strong></h5>
<div class="swiper swiper2">
	<div class="swiper-wrapper">
		<?php foreach ($kuliner as $kl) : ?>
			<div class="shadow card swiper-slide mb-5" style="overflow: hidden; height: auto;">
				<a class="text-decoration-none bg-img" href="<?= base_url('Kuliner/') . $kl['id_kuliner'] ?>">
					<div class="ratio ratio-1x1">
						<img src="<?= base_url('assets/kuliner/') . $kl['image_kuliner'] ?> " class=" card-img-top bg-img rounded w-100 h-100 top-0 ">
						<div class="text-white d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<p></p>
						</div>
					</div>
					<div class="card-body ">
						<h6 class="card-text "><?= $kl['name_kuliner'] ?></h6>
						<p class="card-text"><?= $kl['name_kota'] ?></p>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-pagination" style="bottom: 0 !important; ;"></div>
</div>

<div class="container my-5">
	<hr>
</div>

<div class="container">
	<div class="row row-cols-sm-1 row-cols-md-2 align-items-center">
		<div class="col order-md-2">
			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					<?php foreach ($budaya as $bd) : ?>
						<div class="swiper-slide">
							<img src="<?= base_url('assets/budaya/') . $bd['image_budaya'] ?> " style="height: 200px !important;" class=" card-img-top bg-img rounded w-100 h-100 top-0 ">
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<div class="col order-md-1 text-start">
			<h5 id="" class=" mb-3"><strong>Budaya</strong></h5>
			<p>Indonesia merupakan negara kepulauan terbesar di dunia dengan 17.508 pulau yang dihuni lebih dari 360 suku bangsa. Hal ini membuat Indonesia kaya akan keragaman budaya dan tradisi serta memiliki pemandangan alam yang sangat indah, dilengkapi dengan aneka kulinari yang menggugah selera.</p>
			<a class=" btn btn-primary text-bold" href="<?= base_url('Budaya') ?>"><strong>GO</strong></a>
		</div>

	</div>
</div>

<div class="container my-5">
	<hr>
</div>

<div class="container">
	<div class="row row-cols-sm-1 row-cols-md-2 align-items-center">
		<div class="col ">
			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					<?php foreach ($kerajinan as $kr) : ?>
						<div class="swiper-slide">
							<img src="<?= base_url('assets/kerajinan/') . $kr['image_kerajinan'] ?> " style="height: 200px !important;" class=" card-img-top bg-img rounded w-100 h-100 top-0 ">
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<div class="col text-end ">
			<h5 id="" class="mb-3"><strong>Kerajinan</strong></h5>
			<p>Indonesia mempunyai keindahan budaya yang berbeda beda disetiap daerahnya. Hal ini lah yang membuat Indonesia dikenal banyak sekali mempunyai kerajinan tangan yang berbeda beda sesuai dengan ciri khas daerah nya masing masing. Kerajinan tangan bisa menambah keanekaragaman seni di Indonesia selain itu, kerajinan tangan juga di jadikan sebagai sasaran bagi para turis yang berkunjung ke Indonesia. Karena kerajinan kerajinan tersebut menggambarkan ciri khas sosial dan budaya di Indonesia.</p>
			<a class=" btn btn-primary text-bold" href="<?= base_url('Kerajinan') ?>"><strong>GO</strong></a>
		</div>
	</div>
</div>

<style>
	.swiper {
		width: 85%;
		height: 85%;
		margin-left: auto;
		margin-right: auto;
	}

	.mySwiper {
		width: 300px !important;
		height: 300px !important;
		padding: 50px !important;
	}

	.swiper-slide img {
		display: block;
		width: 100%;
	}
</style>
<script>
	const swiper = new Swiper('.swiper2', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,
		slidesPerView: 1,
		spaceBetween: 30,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: 'true',
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			480: {
				slidesPerView: 3,
				spaceBetween: 30
			},
			640: {
				slidesPerView: 4,
				spaceBetween: 40
			}
		},
	});
</script>
<script>
	var swiper2 = new Swiper(".mySwiper", {
		effect: "flip",
		loop: true,
		grabCursor: true,
		pagination: {
			el: ".swiper-pagination",
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>
