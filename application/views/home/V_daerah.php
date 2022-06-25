<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?></h5>
	<div class="row">
		<?php foreach ($daerah as $da) : ?>
			<?php if ($da['id_kota'] != 0) : ?>
				<div class="col-3 mb-4 ">
					<div class="shadow ratio ratio-1x1 ">
						<a class="bg-img " href="<?= base_url('Daerah/') . $da['id_kota'] ?>">
							<img src="<?= base_url('assets/daerah/') . $da['image_kota'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
							<div class="d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
								<h6 class="text-white"><?= $da['name_kota'] ?></h6>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
