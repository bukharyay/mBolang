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

		<!-- Tambah Modal Wisata -->
		<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahModalLabel">Tambah Wisata</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('user/wisata');  ?>" method="post" enctype="multipart/form-data">
							<div class="mb-3">
								<label class="form-label">Image : </label>
								<input class="form-control " type="file" name="image_wisata" id="formFile">
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control <?= form_error('name_wisata') == true ? 'is-invalid' : '' ?>" id="name_wisata" name="name_wisata" placeholder="Masukkan Wisata..">
								<label for="name_wisata">Nama Wisata : </label>
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control <?= form_error('link') == true ? 'is-invalid' : '' ?>" id="link" name="link" placeholder="Masukkan Link..">
								<label for="link">Link : </label>
							</div>

							<div class="form-floating mb-3">
								<select class="form-select" id="id_kota" name="id_kota" <?= $idDaerah['id_kota'] > 0 ? 'disabled' : '' ?>>
									<option selected>Pilih</option>
									<?php foreach ($daerah as $da) : ?>
										<option <?= $da['id_kota'] == $idDaerah['id_kota'] ? ($da['id_kota'] == 0 ? 'disabled hidden' : 'selected')  : '' ?> value="<?= $da['id_kota'] == 0 ?  '' : $da['id_kota'] ?>"><?= $da['id_kota'] == 0 ? '' : $da['name_kota'] ?></option>
									<?php endforeach; ?>
								</select>
								<label for="id_kota">Pilih Daerah</label>
							</div>

							<div class="form-floating mb-3">
								<textarea class="form-control" placeholder="Deskripsi" name="description_wisata" id="description_wisata" style="height: 10rem"></textarea>
								<label for="description_wisata">Deskripsi : </label>
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
						<th>Nama</th>
						<th>Daerah</th>
						<th>Maps</th>
						<th>Tanggal Dibuat</th>
						<th>Deskripsi</th>
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
					<?php foreach ($wisata as $ws) : ?>
						<tr>
							<td>
								<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $ws['id_wisata'] ?>">
									<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="  <?= base_url('./assets/wisata/') . $ws['image_wisata'] ?>" alt="">
								</a>
							</td>
							<td><?= $ws['name_wisata'] ?></td>
							<td><?= $ws['name_kota'] ?></td>
							<td>
								<a target="_blank" class="btn btn-outline-danger" href="<?= $ws['link'] ?>"><i class="text-outline-danger fas fa-map-marker-alt"></i></a>
							</td>
							<td><?= $ws['date_created'] ?></td>
							<td>
								<textarea style="width: 20rem;height: 10rem;" class="form-control" readonly><?= $ws['description_wisata'] ?></textarea>
							</td>
							<td>
								<button class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $ws['id_wisata'] ?>"><i class="fas fa-edit"></i></button>
								<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $ws['id_wisata'] ?>"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php foreach ($wisata as $ws) : ?>
	<div class="modal fade" id="exampleModal<?= $ws['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content" style="background:transparent; border:transparent;">
				<div class="modal-body">
					<img class="img-thumbnail" src="<?= base_url('assets/wisata/') . $ws['image_wisata'] ?>" alt="">
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Edit Wisata -->
<?php foreach ($wisata as $ws) : ?>
	<div class="modal fade" id="editModal<?= $ws['id_wisata'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Wisata</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('user/wisataEdit/') . $ws['id_wisata'];  ?>" method="post" enctype="multipart/form-data">

						<div class="mb-3">
							<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('assets/wisata/') . $ws['image_wisata']; ?>" alt="wisata">
						</div>
						<div class="mb-3">
							<label class="form-label">Image : </label>
							<input class="form-control " type="file" name="image_wisata" id="formFile">
						</div>

						<div class="form-floating mb-3">
							<input type="text" class="form-control <?= form_error('name_wisata') == true ? 'is-invalid' : '' ?>" id="name_wisata" name="name_wisata" placeholder="Masukkan Wisata.." value="<?= $ws['name_wisata'] ?>">
							<label for="name_wisata">Nama Wisata : </label>
						</div>

						<div class="form-floating mb-3">
							<input type="text" class="form-control <?= form_error('link') == true ? 'is-invalid' : '' ?>" id="link" name="link" placeholder="Masukkan Link.." value="<?= $ws['link'] ?>">
							<label for="name_wisata">Link : </label>
						</div>

						<div class="form-floating mb-3">
							<select class="form-select" id="id_kota" name="id_kota" <?= $idDaerah['id_kota'] > 0 ? 'disabled' : '' ?>>
								<option selected>Pilih</option>
								<?php foreach ($daerah as $da) : ?>
									<option <?= $da['id_kota'] == $ws['id_kota'] ? 'selected' : ($da['id_kota'] == 0 ? 'disabled hidden' : ''); ?> value="<?= $da['id_kota'] == 0 ? '' : $da['id_kota'] ?>"><?= $da['id_kota'] == 0 ? '' : $da['name_kota'] ?></option>
								<?php endforeach; ?>
							</select>
							<label for="id_kota">Pilih Daerah</label>
						</div>

						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Deskripsi" name="description_wisata" id="description_wisata" style="height: 10rem"><?= $ws['description_wisata'] ?></textarea>
							<label for="description_wisata">Deskripsi : </label>
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

<!-- Modal Delete Wisata -->
<?php foreach ($wisata as $ws) : ?>
	<div class="modal fade" id="deleteModal<?= $ws['id_wisata'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Hapus Wisata</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus wisata ini?</p>
					<form action="<?= base_url('user/wisataDelete/') . $ws['id_wisata'];  ?>" method="post">

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
