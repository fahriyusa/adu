<?= $this->session->flashdata('pesan');?>
<div class="page-heading">
	<section class="section">
		<div class="card">
			<div class="card-header">
				Data Petugas
			</div>
			<div class="card-body">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#success">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-plus-fill"
						viewBox="0 0 16 16">
						<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
						<path fill-rule="evenodd"
							d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z">
						</path>
					</svg> Tambah data
				</button>

				<table class="table table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Telephone</th>
							<th>Role</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=1; foreach ($su_table as $key) {?>
						<tr>
							<td><?= $no++?></td>
							<td><?= $key['nama_petugas']?></td>
							<td><?= $key['username']?></td>
							<td><?= $key['tlp']?></td>
							<td>
								<?= $key['role']?>
								</td>
							
							<td>
								<a  class="btn btn-danger" href="<?= base_url('Admin/hapus_petugas')?>/<?=$key['id']?>" role="button">hapus</a>
							</td>
							
						</tr> <?php }?>
					</tbody>

				</table>
			</div>
		</div>

	</section>
</div>
<!-- Modal -->

<div class="modal-success me-1 mb-1 d-inline-block">

	<!--Success theme Modal -->
	<div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title white" id="myModalLabel110">Tambah Admin/Petugas
					</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url('Admin/add_petugas')?>">


						<div class="form-group">
							<div class="col-md-4 mt-2">
								<label>Nama Lengkap</label>
							</div>

							<input id="my-input" class="form-control" type="text" name="nama_petugas" required>
						</div>
						<div class="form-group">
							<div class="col-md-4 mt-3">
								<label>Username</label>
							</div>

							<input id="my-input" class="form-control" type="text" name="username" required>
						</div>
						<div class="form-group">
							<div class="col-md-4 mt-3">
								<label>Password</label>
							</div>

							<input id="my-input" class="form-control" type="password" name="password" required>
						</div>
						<div class="form-group">
							<div class="col-md-4 mt-3">
								<label>No Hp</label>
							</div>
							<input id="my-input" class="form-control" type="number" name="tlp" required>
						</div>
						<div class="mb-3">
							<div class="col-md-4 mt-3">
								<label>Role/Level</label>
							</div>
							<select class="form-select form-select" name="role" required>
								<option selected>Pilih</option>
								<option value="a">admin</option>
								<option value="p">Petugas</option>

							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Batal</span>
					</button>

					<button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Tambah</span>
					</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
