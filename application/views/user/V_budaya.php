<div class="card">
	<div class="card-body">
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <?= strip_tags($this->session->flashdata('success')); ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>

		<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
			Tambah <i class="fas fa-plus"></i>
		</button>

		<!-- Tambah Modal Budaya -->
		<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahModalLabel">Tambah Budaya</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('user/budaya');  ?>" method="post" enctype="multipart/form-data">
							<div class="mb-3">
								<label class="form-label">Image : </label>
								<input class="form-control " type="file" name="image_budaya" id="formFile">
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control <?= form_error('name_budaya') == true ? 'is-invalid' : '' ?>" id="name_budaya" name="name_budaya" placeholder="Masukkan Budaya..">
								<label for="labelname_budaya">Nama Budaya : </label>
							</div>

							<div class="form-floating mb-3">
								<select class="form-select" id="id_kota" name="id_kota" <?= $idDaerah['id_kota'] > 0 ? 'disabled' : '' ?>>
									<option selected>Pilih</option>
									<?php foreach ($daerah as $da) : ?>
										<option <?= $da['id_kota'] == $idDaerah['id_kota'] ? ($da['id_kota'] == 0 ? 'disabled hidden' : 'selected') : ''; ?> value="<?= $da['id_kota'] == 0 ? ''  : $da['id_kota']  ?>"><?= $da['id_kota'] == 0 ? '' : $da['name_kota'] ?></option>
									<?php endforeach; ?>
								</select>
								<label for="id_kota">Pilih Daerah</label>
							</div>

							<div class="form-floating mb-3">
								<textarea class="form-control" placeholder="Deskripsi" name="description_budaya" id="description_budaya" style="height: 10rem"></textarea>
								<label for="description_budaya">Deskripsi : </label>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
						<button type="submit" class="btn btn-primary">Tambah <i class="fas fa-save"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive text-nowrap">
			<table id="example" class="table table-striped text-center " style="width:100%; white-space:nowrap;">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Budaya</th>
						<th>Deskripsi</th>
						<th>Daerah</th>
						<th>Tanggal Dibuat</th>
						<th>Action</th>
					</tr>
				</thead>
				<style>
					table>thead>tr>th {
						text-align: center !important;
					}

					table>tbody>tr>td {
						vertical-align: middle;
					}
				</style>
				<tbody>
					<?php foreach ($budaya as $bd) : ?>
						<tr>
							<td>
								<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $bd['id_budaya'] ?>">
									<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('./assets/budaya/') .  $bd['image_budaya']; ?>" alt="">
								</a>
							</td>
							<td><?= $bd['name_budaya'] ?></td>
							<td>
								<textarea style="width: 20rem;height: 10rem;" class="form-control" readonly><?= $bd['description_budaya'] ?></textarea>
							</td>
							<td><?= $bd['name_kota'] ?></td>
							<td><?= $bd['date_created'] ?></td>
							<td>
								<button class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $bd['id_budaya'] ?>"><i class=" fas fa-edit"></i></button>
								<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $bd['id_budaya'] ?>"><i class=" fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php foreach ($budaya as $bd) : ?>
	<div class="modal fade" id="exampleModal<?= $bd['id_budaya'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content" style="background:transparent; border:transparent;">
				<div class="modal-body">
					<img class="img-thumbnail" src="<?= base_url('./assets/budaya/') . $bd['image_budaya'] ?>" alt="">
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Edit Budaya -->
<?php foreach ($budaya as $bd) : ?>
	<div class="modal fade" id="editModal<?= $bd['id_budaya'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Daerah</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('user/budayaEdit/') . $bd['id_budaya'];  ?>" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('assets/budaya/') . $bd['image_budaya']; ?>" alt="budaya">
						</div>

						<div class="mb-3">
							<label class="form-label">Image : </label>
							<input class="form-control " type="file" name="image_budaya" id="formFile">
						</div>

						<div class="form-floating mb-3">
							<input type="text" class="form-control <?= form_error('name_budaya') == true ? 'is-invalid' : '' ?>" id="name_budaya" name="name_budaya" placeholder="Masukkan Budaya.." value="<?= $bd['name_budaya'] ?>">
							<label for="name_budaya">Nama Budaya : </label>
						</div>

						<div class="form-floating mb-3">
							<select class="form-select" id="id_kota" name="id_kota" <?= $idDaerah['id_kota'] > 0 ? 'disabled' : '' ?>>
								<option selected>Pilih</option>
								<?php foreach ($daerah as $da) : ?>
									<option <?= $da['id_kota'] == $bd['id_kota'] ?  'selected' : ($da['id_kota'] == 0 ? 'disabled hidden' : ''); ?> value="<?= $da['id_kota'] == 0 ? '' : $da['id_kota'] ?>"><?= $da['id_kota'] == 0 ? '' : $da['name_kota'] ?></option>
								<?php endforeach; ?>
							</select>
							<label for="id_kota">Pilih Daerah</label>
						</div>

						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Deskripsi" name="description_budaya" id="description_budaya" style="height: 10rem"><?= $bd['description_budaya'] ?></textarea>
							<label for="description_budaya">Deskripsi : </label>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
					<button type="submit" class="btn btn-warning">Update <i class="fas fa-sync-alt"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Delete Budaya -->
<?php foreach ($budaya as $bd) : ?>
	<div class="modal fade" id="deleteModal<?= $bd['id_budaya'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Hapus Budaya</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus budaya ini?</p>
					<form action="<?= base_url('user/budayaDelete/') . $bd['id_budaya'];  ?>" method="post">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
					<button type="submit" class="btn btn-danger">Hapus <i class="fas fa-trash"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
