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

		<!-- Tambah Modal -->
		<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahModalLabel">Tambah Daerah</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('admin/daerah');  ?>" method="post" enctype="multipart/form-data">
							<div class="mb-3">
								<label class="form-label">Image : </label>
								<input class="form-control " type="file" name="image_kota" id="formFile">
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control <?= form_error('name_kota') == true ? 'is-invalid' : '' ?>" id="name_kota" name="name_kota" placeholder="Masukkan Daerah..">
								<label for="name_kota">Nama Daerah : </label>
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control <?= form_error('link') == true ? 'is-invalid' : '' ?>" id="link" name="link" placeholder="Masukkan Link..">
								<label for="link">Link : </label>
							</div>

							<div class="form-floating mb-3">
								<textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 10rem"></textarea>
								<label for="description">Deskripsi : </label>
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
						<th>Daerah</th>
						<th>Link</th>
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
					<?php foreach ($daerah as $da) : ?>
						<?php if ($da['id_kota'] != 0) : ?>
							<tr>
								<td>
									<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $da['id_kota'] ?>">
										<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('./assets/daerah/') . $da['image_kota'] ?>" alt="">
									</a>
								</td>
								<td><?= $da['name_kota'] ?></td>
								<td>
									<a target="_blank" class="btn btn-outline-danger" href="<?= $da['link'] ?>"><i class="text-outline-danger fas fa-map-marker-alt"></i></a>
								</td>
								<td>
									<textarea style="width: 20rem;height: 10rem;" class="form-control" readonly><?= $da['description'] ?></textarea>
								</td>
								<td>
									<button class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $da['id_kota'] ?>"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $da['id_kota'] ?>"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php foreach ($daerah as $da) : ?>
	<div class="modal fade" id="exampleModal<?= $da['id_kota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content" style="background:transparent; border:transparent;">
				<div class="modal-body">
					<img class="img-thumbnail" src="<?= base_url('./assets/daerah/') . $da['image_kota'] ?>" alt="">
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>


<!-- Modal Edit Daerah -->
<?php foreach ($daerah as $da) : ?>
	<div class="modal fade" id="editModal<?= $da['id_kota'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Edit Daerah</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/daerahEdit/') . $da['id_kota'];  ?>" method="post" enctype="multipart/form-data">

						<div class="mb-3">
							<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('assets/daerah/') . $da['image_kota']; ?>" alt="daerah">
						</div>

						<div class="mb-3">
							<label class="form-label">Image : </label>
							<input class="form-control " type="file" name="image_kota" id="formFile">
						</div>

						<div class="form-floating mb-3">
							<input type="text" class="form-control <?= form_error('name_kota') == true ? 'is-invalid' : '' ?>" id="name_kota" name="name_kota" placeholder="Masukkan Daerah.." value="<?= $da['name_kota'] ?>">
							<label for="name_kota">Nama Daerah : </label>
						</div>

						<div class="form-floating mb-3">
							<input type="text" class="form-control <?= form_error('link') == true ? 'is-invalid' : '' ?>" id="link" name="link" placeholder="Masukkan Link.." value="<?= $da['link'] ?>">
							<label for="link">Link : </label>
						</div>

						<div class="form-floating mb-3">
							<textarea class="form-control" rows="8" placeholder="Deskripsi" name="description" id="description" style="height: 10rem"><?= $da['description'] ?></textarea>
							<label for="description">Deskripsi : </label>
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



<!-- Modal Delete Daerah -->
<?php foreach ($daerah as $da) : ?>
	<div class="modal fade" id="deleteModal<?= $da['id_kota'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Hapus Daerah</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus daerah ini?</p>
					<form action="<?= base_url('admin/daerahDelete/') . $da['id_kota'];  ?>" method="post">

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
