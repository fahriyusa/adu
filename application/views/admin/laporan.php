
	<div class="row">
    <div class="col">
		<div class="card">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div class="avatar avatar-xl">
						<img src="<?= base_url('./')?>assets/images/faces/1.jpg" alt="Face 1">
					</div>
					<?php
					if ($this->session->userdata('role') == 'm') {?>
						<div class="ms-3 name"><h5 class="font-bold"><?= $data['nama'];?></h5>
					<?php } else { ?>
						<div class="ms-3 name"><h5 class="font-bold"><?= $data['nama_petugas'];?></h5>
					<?php }
					
			  		?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-heading">
		<h3> 
            <!-- judul halaman -->
			<?= $header ?>
        </h3>
	</div>
    
	<div class="page-content">
		<section class="row">
		<div class="col">
			
                    <!-- Content disini bro -->
<div class="page-heading">

	<section class="section">
		<div class="card">
			<div class="card-header">
				Data Aduan Ditanggapi
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nik</th>
								<th>Nama</th>
								<th>Judul Aduan</th>
								<th>Tanggal Diajukan</th>
								<th>Tanggal Ditanggapi</th>
								<th>Bukti Foto</th>
								<th>Telephone</th>
								<th>Isi Aduan</th>
								<th>Tanggapan</th>
								<th>Petugas</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php $no=1; foreach ($join  as $key) {?>
							<tr>
								<!-- <?= var_dump($key)?> -->
								<td>
                                    <?= $no++?>
                                </td>
								<td>
                                    <?= $key['nik']?>
                                </td>
								<td>
                                    <?= $key['nama']?>
                                </td>
								<td>
                                    <?= $key['judul']?>
                                </td>
								<td>
                                    <?= $key['tgl']?>
                                </td>
								<td>
                                    <?= $key['tgl_tanggapan']?>
								</td>
								<td>
									<img class="img-fluid" width="200"
										src="<?= base_url('./assets/images/aduan/'). $key['foto']?>" alt=""></td>
								
								<td>
									<?= $key['tlp']?>
								</td>
								<td>
									<?= $key['isi']?>
								</td>
								<td>
									<?= $key['tanggapan']?>
								</td>
								<td>
									<?= $key['nama_petugas']?>
								</td>
                                <td>
								<?php
                                if ($key['status'] == '0') {
                                   echo '<span class="badge bg-secondary">Belum Diproses</span>';
                                }?>
								<?php
                                if ($key['status'] == 'p') {
                                   echo '<span class="badge bg-warning">Proses</span>';
                                }?>
								<?php
                                if ($key['status'] == 's') {
                                    echo '<span class="badge bg-success">Selesai</span>';
                                }?>
								<?php
                                if ($key['status'] == 't') {
                                  echo  '<span class="badge bg-danger">Ditolak</span>';
                                }
                                ?>
								</td>
							</tr> <?php }?>
						</tbody>

					</table>
				</div>
			</div>

	</section>
</div>
<script>
    window.print()
</script>