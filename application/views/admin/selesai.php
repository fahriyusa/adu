<?= $this->session->flashdata('pesan');?>
<div class="page-heading">
	<section class="section">
		<div class="card">
			<div class="card-header">
				Data Aduan Saya
			</div>
			<div class="card-body">
				<table class="table table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nik</th>
							<th>Nama</th>
							<th>Judul Aduan</th>
							<th>Tanggal Diajukan</th>
							<th>Bukti Foto</th>
							<th>Isi Aduan</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=1; foreach ($su_table as $key) {?>
						<tr>
							<td><?= $no++?></td>
							<td><?= $key['nik']?></td>
							<td><?= $key['nama']?></td>
							<td><?= $key['judul']?></td>
							<td><?= $key['tgl']?></td>
							<td><img  class="img-fluid" width="200"
									src="<?= base_url('./assets/images/aduan/'). $key['foto']?>" alt=""></td>
							<td><?= $key['isi']?></td>
							<td>
                                <form action="<?= base_url()?>Admin/selesaikan" method="post">
                                    <input type="hidden" name="id_aduan" value="<?=$key['id_aduan']?>">
                                <button class="btn btn-primary" onclick="confirm('yakin dek sudah selesai?')"role="button">Selesai</button>
							</form>
                        </td>
						</tr> <?php }?>
					</tbody>

				</table>
			</div>
		</div>

	</section>
</div>
