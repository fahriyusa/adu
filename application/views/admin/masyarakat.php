<?= $this->session->flashdata('pesan');?>
<div class="page-heading">
	<section class="section">
		<div class="card">
			<div class="card-header">
				Data Masyarakat
			</div>
			<div class="card-body">
				<!-- Button trigger modal -->
				<table class="table table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Telephone</th>
							<!-- <th>Role</th> -->
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=1; foreach ($su_table as $key) {?>
						<tr>
							<td><?= $no++?></td>
							<td><?= $key['nama']?></td>
							<td><?= $key['username']?></td>
							<td><?= $key['tlp']?></td>
							<!-- <td>

								<?= $key['role']?></td> -->

							<td>
								<a  class="btn btn-danger" href="<?= base_url('Admin/hapus_masyarakat')?>/<?=$key['nik']?>" role="button">hapus</a>
							</td>
						</tr> <?php }?>
					</tbody>

				</table>
			</div>
		</div>

	</section>
</div>

<!-- Modal -->