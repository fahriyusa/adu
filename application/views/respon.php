<?= $this->session->flashdata('pesan');
?>
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
                            <?= var_dump($key)?>
                            <td><?= $no++?></td>
                            <td><?= $key['nik']?></td>
                            <td><?= $key['nama']?></td>
                            <td><?= $key['judul']?></td>
                            <td><?= $key['tgl']?></td>
                            <td>
                                <img class="img-fluid" width="200" src="<?= base_url('./assets/images/aduan/'). $key['foto']?>" alt=""></td>
                            <td>
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
                        </tr>     <?php }?>
                    </tbody>   
               
                </table>
            </div>
        </div>

    </section>
</div>
