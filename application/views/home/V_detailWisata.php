<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?> <?= $wisata['name_wisata'] ?></h5>
	<div class="row">
		<div class="col-3 mb-4 text-center ">
			<div class="shadow ratio ratio-1x1 " style="height:auto !important ;">
				<a href="">
					<img src="<?= base_url('assets/wisata/') . $wisata['image_wisata'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
				</a>
			</div>
			<a class="mt-3  btn btn-danger" target="_blank" href="<?= $wisata['link'] ?>">Lihat Lokasi <i class="fas fa-fw fa-map-marker-alt"></i> </a>
		</div>
		<div class="col-9 mb-4 ">
			<p><?= $wisata['description_wisata'] ?></p>
		</div>
	</div>
</div>
