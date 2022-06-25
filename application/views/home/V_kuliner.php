<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?></h5>
	<p class="mb-5">Indonesia merupakan salah satu negara dengan kekayaan kuliner yang mengesankan dan mengagumkan. Makanan asal Indonesia juga terkenal dengan bumbu rempahnya yang melimpah. Sehingga tak jarang ini menciptakan rasa makanan atau masakan yang sulit ditemukan di negara lain. Kekayaan rempah di dalam setiap masakan juga membuat rasa makanan memiliki ciri khas tersendiri yang sangat lezat.</p>
	<div class="row">
		<?php foreach ($kuliner as $kl) : ?>
			<div class="col-3 mb-4 ">
				<div class="shadow ratio ratio-1x1 ">
					<a class="bg-img " href="<?= base_url('Kuliner/') . $kl['id_kuliner'] ?>">
						<img src="<?= base_url('assets/kuliner/') . $kl['image_kuliner'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="text-white d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $kl['name_kuliner'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
