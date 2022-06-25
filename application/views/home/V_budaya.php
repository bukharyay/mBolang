<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?></h5>
	<p class="mb-5">Indonesia merupakan negara kepulauan terbesar di dunia dengan 17.508 pulau yang dihuni lebih dari 360 suku bangsa. Hal ini membuat Indonesia kaya akan keragaman budaya dan tradisi serta memiliki pemandangan alam yang sangat indah, dilengkapi dengan aneka kulinari yang menggugah selera.</p>
	<div class="row">
		<?php foreach ($budaya as $bd) : ?>
			<div class="col-3 mb-4 ">
				<div class="shadow ratio ratio-1x1 ">
					<a class="bg-img " href="<?= base_url('Budaya/') . $bd['id_budaya'] ?>">
						<img src="<?= base_url('assets/budaya/') . $bd['image_budaya'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="text-white d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $bd['name_budaya'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
