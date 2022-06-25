<div class="row">
	<div class="col-md-3 col-sm-1">
		<div class="card border-danger mb-4">
			<div class="card-body text-danger">
				<h5 class="card-title">Budaya</h5>

				<p class="card-text">Total Budaya : <?= $this->db->get_where('tb_budaya', ['id_kota' => $idDaerah['id_kota']])->num_rows(); ?> budaya</p>
				<a href="<?= base_url('user/budaya') ?>" class="btn btn-danger">Budaya</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-warning mb-4">
			<div class="card-body text-warning">
				<h5 class="card-title">Kerajinan</h5>
				<p class="card-text">Total Kerajinan : <?= $this->db->get_where('tb_kerajinan', ['id_kota' => $idDaerah['id_kota']])->num_rows(); ?> kerajinan</p>
				<a href="<?= base_url('user/kerajinan') ?>" class="btn btn-warning">Kerajinan</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-info mb-4">
			<div class="card-body text-info">
				<h5 class="card-title">Wisata</h5>
				<p class="card-text">Total Wisata : <?= $this->db->get_where('tb_wisata', ['id_kota' => $idDaerah['id_kota']])->num_rows(); ?> wisata</p>
				<a href="<?= base_url('user/wisata') ?>" class="btn btn-info">Wisata</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-success mb-4">
			<div class="card-body text-success">
				<h5 class="card-title">Kuliner</h5>
				<p class="card-text">Total Kuliner : <?= $this->db->get_where('tb_kuliner', ['id_kota' => $idDaerah['id_kota']])->num_rows(); ?> kuliner</p>
				<a href="<?= base_url('user/kuliner') ?>" class="btn btn-success">Kuliner</a>
			</div>
		</div>
	</div>
</div>
