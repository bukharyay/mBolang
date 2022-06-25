<div class="card">
	<div class="card-body">
		<!-- <h5 class="card-title"><?= $title; ?></h5> -->
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <?= strip_tags($this->session->flashdata('success')); ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>

		<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
			Tambah <i class="fas fa-user-plus"></i>
		</button>

		<!-- Tambah Modal -->
		<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahModalLabel">Tambah User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('admin/user');  ?>" method="post" enctype="multipart/form-data">
							<div class="mb-3">
								<label class="form-label">Avatar : </label>
								<input class="form-control " type="file" name="avatar" id="formFile">
							</div>

							<div class="mb-3">
								<label class="form-label">Nama : </label>
								<input type="text" class="form-control <?= form_error('name_user') == true ? 'is-invalid' : '' ?>" id="name_user" name="name_user">
							</div>

							<div class="mb-3">
								<label class="form-label">Role : </label>
								<select class="form-select" name="id_role">
									<option selected>Pilih</option>
									<option value="1">Admin</option>
									<option value="2">User</option>
								</select>
							</div>

							<div class="mb-3">
								<label class="form-label">Daerah : </label>
								<select class="form-select" name="id_kota">
									<option selected>Pilih</option>
									<?php foreach ($daerah as $da) : ?>
										<option value="<?= $da['id_kota'] ?>"><?= $da['name_kota'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="mb-3">
								<label class="form-label">Email : </label>
								<input type="email" class="form-control <?= form_error('email') == true ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="name@example.com">
							</div>
							<div class="mb-3">
								<label class="form-label">Password : </label>
								<input type="text" class="form-control" readonly value="12345">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
						<button type="submit" class="btn btn-primary">Tambah <i class="fas fa-user-plus"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="table-responsive text-nowrap">
			<table id="example" class="table table-striped text-center " style="width:100%; white-space:nowrap;">
				<thead>
					<tr>
						<th>Image</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						<th>Daerah</th>
						<th>Status</th>
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
				<tbody align="center">
					<?php foreach ($userm as $us) : ?>
						<tr>
							<td>
								<a href="" data-bs-toggle="modal" data-bs-target="#tampilImage<?= $us['id_user'] ?>">
									<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('assets/user/') . $us['avatar']; ?>" alt="Avatar">
								</a>
							</td>
							<td><?= $us['name_user'] ?></td>
							<td><?= $us['email'] ?></td>
							<td><?= $us['id_role'] == 1 ? 'Admin' : 'User'; ?></td>
							<td><?= $us['id_kota'] == '' ? 'Admin' : $us['name_kota']; ?></td>
							<td><?= $us['is_active'] == 1 ? '<button type="button" class="btn btn-success">Active <i class="fas fa-user-check"></i></button>' : '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#activeModal' . $us['id_user'] . '">Belum Active <i class="fas fa-user-clock"></i></button>'; ?></td>
							<td><?= $us['date_created'];  ?></td>


							<td>
								<button class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $us['id_user'] ?>"><i class="fas fa-user-edit"></i></button>
								<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $us['id_user'] ?>"><i class="fas fa-user-minus"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Show Image -->
<?php foreach ($userm as $us) : ?>
	<div class="modal fade" id="tampilImage<?= $us['id_user'] ?>" tabindex="-1" aria-labelledby="tampilImageLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content" style="background:transparent; border:transparent;">
				<div class="modal-body">
					<img class="img-thumbnail" src="<?= base_url('assets/user/') . $us['avatar']; ?>" alt="">
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Active User -->
<?php foreach ($userm as $us) : ?>
	<div class="modal fade" id="activeModal<?= $us['id_user'] ?>" tabindex="-1" aria-labelledby="activeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="activeModalLabel">Aktifkan User?</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda ingin mengatifkan user ini?</p>
					<form action="<?= base_url('admin/active/') . $us['id_user'];  ?>" method="post" enctype="multipart/form-data">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
					<button type="submit" class="btn btn-success">Aktifkan <i class="fas fa-user-check"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Edit User -->
<?php foreach ($userm as $us) : ?>
	<div class="modal fade" id="editModal<?= $us['id_user'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/userEdit/') . $us['id_user'];  ?>" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<img class="img-thumbnail" style="min-width: 10rem;max-width: 10rem;" src="<?= base_url('assets/user/') . $us['avatar']; ?>" alt="Avatar">
						</div>
						<div class="mb-3">
							<label class="form-label">Avatar : </label>
							<input class="form-control " type="file" name="avatar" id="formFile">
						</div>

						<div class="mb-3">
							<label class="form-label">Nama : </label>
							<input type="text" class="form-control <?= form_error('name_user') == true ? 'is-invalid' : '' ?>" id="name_user" name="name_user" value="<?= $us['name_user'] ?>" required>
						</div>

						<div class="mb-3">
							<label class="form-label">Role : </label>
							<select class="form-select" name="id_role">
								<option value="1" <?= $us['id_role'] == 1 ? 'selected' : '' ?>>Admin</option>
								<option value="2" <?= $us['id_role'] == 2 ? 'selected' : '' ?>>User</option>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Daerah : </label>
							<select class="form-select" name="id_kota">
								<?php foreach ($daerah as $da) : ?>
									<option <?= $da['id_kota'] == $us['id_kota'] ? 'selected' : '' ?> value="<?= $da['id_kota'] ?>"><?= $da['name_kota'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Email : </label>
							<input type="email" class="form-control <?= form_error('email') == true ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="name@example.com" value="<?= $us['email'] ?>" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Password : </label>
							<input type="text" class="form-control" name="password" id="password" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
					<button type="submit" class="btn btn-warning">Update <i class="fas fa-user-edit"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Delete User -->
<?php foreach ($userm as $us) : ?>
	<div class="modal fade" id="deleteModal<?= $us['id_user'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Hapus User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus user ini?</p>
					<form action="<?= base_url('admin/userDelete/') . $us['id_user'];  ?>" method="post">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas  fa-chevron-left"></i> Close</button>
					<button type="submit" class="btn btn-danger">Hapus <i class="fas fa-user-minus"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
