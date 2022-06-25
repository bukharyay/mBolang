<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?> <?= $kerajinan['name_kerajinan'] ?></h5>
	<div class="row">
		<div class="col-3 mb-4 ">
			<div class="shadow ratio ratio-1x1 " style="height:auto !important ;">
				<a href="">
					<img src="<?= base_url('assets/kerajinan/') . $kerajinan['image_kerajinan'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">

				</a>
			</div>
		</div>
		<div class="col-9 mb-4 ">
			<p><?= $kerajinan['description_kerajinan'] ?></p>
		</div>
	</div>
</div>
