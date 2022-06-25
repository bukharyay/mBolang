<div class="row">
	<p>Selamat Datang, <?= $this->session->userdata('email') ?></p>
	<div class="col-md-3 col-sm-1">
		<div class="card border-secondary mb-4">
			<div class="card-body text-secondary">
				<h5 class="card-title">User</h5>
				<p class="card-text">Total Pengguna : <?= $this->db->get('tb_user')->num_rows(); ?> pengguna</p>
				<a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">User</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-dark mb-4">
			<div class="card-body text-dark">
				<h5 class="card-title">Daerah</h5>
				<p class="card-text">Total Daerah : <?= $this->db->get('tb_kota')->num_rows(); ?> daerah</p>
				<a href="<?= base_url('admin/daerah') ?>" class="btn btn-dark">Daerah</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-danger mb-4">
			<div class="card-body text-danger">
				<h5 class="card-title">Budaya</h5>
				<p class="card-text">Total Budaya : <?= $this->db->get('tb_budaya')->num_rows(); ?> budaya</p>
				<a href="<?= base_url('user/budaya') ?>" class="btn btn-danger">Budaya</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-warning mb-4">
			<div class="card-body text-warning">
				<h5 class="card-title">Kerajinan</h5>
				<p class="card-text">Total Kerajinan : <?= $this->db->get('tb_kerajinan')->num_rows(); ?> kerajinan</p>
				<a href="<?= base_url('user/kerajinan') ?>" class="btn btn-warning">Kerajinan</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-info mb-4">
			<div class="card-body text-info">
				<h5 class="card-title">Wisata</h5>
				<p class="card-text">Total Wisata : <?= $this->db->get('tb_wisata')->num_rows(); ?> wisata</p>
				<a href="<?= base_url('user/wisata') ?>" class="btn btn-info">Wisata</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-1">
		<div class="card border-success mb-4">
			<div class="card-body text-success">
				<h5 class="card-title">Kuliner</h5>
				<p class="card-text">Total Kuliner : <?= $this->db->get('tb_kuliner')->num_rows(); ?> kuliner</p>
				<a href="<?= base_url('user/kuliner') ?>" class="btn btn-success">Kuliner</a>
			</div>
		</div>
	</div>
</div>
