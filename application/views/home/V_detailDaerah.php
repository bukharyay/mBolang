<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?> <?= $daerah['name_kota'] ?></h5>
	<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
		<div class="col-lg-8 col-sm-12 order-sm-2 order-md-1 mb-4 ">
			<p><?= $daerah['description'] ?></p>
			<a class="btn btn-danger" target="_blank" href="<?= $daerah['link'] ?>">Lihat Profile Daerah <i class="fas fa-fw fa-map-marker-alt"></i> </a>
		</div>
		<div class="col-lg-4 col-sm-12 order-sm-1 order-md-2 mb-4 ">
			<div class="shadow ratio ratio-1x1 " style="height:auto !important ;">
				<a href="">
					<img src="<?= base_url('assets/daerah/') . $daerah['image_kota'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container my-5">
	<hr>
</div>

<div class="container">
	<h5 class="text-center">Keliling <?= $daerah['name_kota'] ?></h5>
	<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
		<?php foreach ($wisata as $ws) : ?>
			<div class="col-lg-3 col-md-6 col-sm-8 mb-3">
				<div class="shadow ratio ratio-1x1 me-3" style="height:auto !important ;">
					<a class="bg-img " href="<?= base_url('Wisata/') . $ws['id_wisata'] ?>">
						<img src="<?= base_url('assets/wisata/') . $ws['image_wisata'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">

							<h6 class="text-white"><?= $ws['name_wisata'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<section class="bg-dark">
	<div class="container py-5">
		<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
			<div class="col-lg-1 col-md-12 col-sm-12">
				<h5 class="border-start border-3 text-start text-white ps-3"> Berburu Kuliner <br> <?= $daerah['name_kota'] ?></h5>
			</div>
			<div class="col-lg-11 col-md-12 col-sm-12 ">
				<div class="row my-3 justify-content-center">
					<?php foreach ($kuliner as $kl) : ?>
						<div class="col-lg-4 col-md-6 col-sm-8">
							<div class="shadow ratio ratio-1x1 me-3 mb-3" style="height:auto !important ; ">
								<a class="bg-img " href="<?= base_url('Kuliner/') . $kl['id_kuliner'] ?>">
									<img src="<?= base_url('assets/kuliner/') . $kl['image_kuliner'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
									<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
										<h6 class="text-white"><?= $kl['name_kuliner'] ?></h6>
									</div>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container mt-5">
	<h5 class="text-center">Beragam Kebudayaan di <?= $daerah['name_kota'] ?></h5>
	<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
		<?php foreach ($budaya as $bd) : ?>
			<div class="col-lg-3 col-md-6 col-sm-8 mb-3">
				<div class="shadow ratio ratio-1x1 me-3" style="height:auto !important ; ">
					<a class="bg-img " href="<?= base_url('Budaya/') . $bd['id_budaya'] ?>">
						<img src="<?= base_url('assets/budaya/') . $bd['image_budaya'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $bd['name_budaya'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container my-5">
	<hr>
</div>

<div class="container">
	<h5 class="text-center">Kerajinan di <?= $daerah['name_kota'] ?></h5>
	<div class="row row-cols-sm-1 row-cols-md-2 my-5 justify-content-center">
		<?php foreach ($kerajinan as $kr) : ?>
			<div class="col-lg-3 col-md-6 col-sm-8 mb-3">
				<div class="shadow ratio ratio-1x1 me-3" style="height:auto !important ; ">
					<a class="bg-img " href="<?= base_url('Kerajinan/') . $kr['id_kerajinan'] ?>">
						<img src="<?= base_url('assets/kerajinan/') . $kr['image_kerajinan'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $kr['name_kerajinan'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
