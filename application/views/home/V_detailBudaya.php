<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?> <?= $budaya['name_budaya'] ?></h5>
	<div class="row">
		<div class="col-3 mb-4 ">
			<div class="shadow ratio ratio-1x1 " style="height:auto !important ;">
				<a href="">
					<img src="<?= base_url('assets/budaya/') . $budaya['image_budaya'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">

				</a>
			</div>
		</div>
		<div class="col-9 mb-4 ">
			<p><?= $budaya['description_budaya'] ?></p>
		</div>
	</div>
</div>
