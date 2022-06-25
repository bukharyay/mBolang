<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?></h5>
	<p class="mb-5">Indonesia memang terkenal dengan segudang tempat yang indah dan unik. Namun sayangnya, tak banyak yang mengetahui hal itu dikarenakan seringkali para wisatawan asing memilih tempat wisata yang dituju kebanyakan masih sangat mainstream. Salah satu kota yang biasa dikunjungi pasti kota itu lagi, contoh saja kota Bali, Yogyakarta, atau Lombok. Padahal selain itu, masih banyak kota di Indonesia yang banyak menawarkan keindahan alam yang unik dan menakjubkan.</p>
	<div class="row">
		<?php foreach ($wisata as $ws) : ?>
			<div class="col-3 mb-4 ">
				<div class="shadow ratio ratio-1x1 ">
					<a class="bg-img " href="<?= base_url('Wisata/') . $ws['id_wisata'] ?>">
						<img src="<?= base_url('assets/wisata/') . $ws['image_wisata'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="text-white d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $ws['name_wisata'] ?></h6>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
