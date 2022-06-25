<div class="container" style="margin-top: 66px !important;">
	<h5><?= $title ?></h5>
	<p class="mb-5">Indonesia mempunyai keindahan budaya yang berbeda beda disetiap daerahnya. Hal ini lah yang membuat Indonesia dikenal banyak sekali mempunyai kerajinan tangan yang berbeda beda sesuai dengan ciri khas daerah nya masing masing. Kerajinan tangan bisa menambah keanekaragaman seni di Indonesia selain itu, kerajinan tangan juga di jadikan sebagai sasaran bagi para turis yang berkunjung ke Indonesia. Karena kerajinan kerajinan tersebut menggambarkan ciri khas sosial dan budaya di Indonesia.</p>
	<div class="row">
		<?php foreach ($kerajinan as $kr) : ?>
			<div class="col-3 mb-4 ">
				<div class="shadow ratio ratio-1x1 ">
					<a class="bg-img " href="<?= base_url('Kerajinan/') . $kr['id_kerajinan'] ?>">
						<img src="<?= base_url('assets/kerajinan/') . $kr['image_kerajinan'] ?> " class=" bg-img rounded w-100 h-100 top-0 ">
						<div class="text-white d-flex justify-content-center  h-100 w-100 position-absolute align-items-end top-0 text-center  " style="    background: transparent linear-gradient(180deg,rgb(253 253 253 / 0%) 0,rgb(0 0 0 / 53%) 100%) 0 0 no-repeat padding-box;	">
							<h6 class="text-white"><?= $kr['name_kerajinan'] ?></h5>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
