    <section id="basic-horizontal-layouts">
	<div class="row match-height">
		<div class="col col-12">		
			<?= 
				$this->session->flashdata('pesan');
				 	?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Tanggapi Aduan</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form class="form form-horizontal" action="<?= base_url('Admin/tanggapi')?>"  method="POST">
							<div class="form-body">
								<div class="row">
									<div class="col-md-4">
										<label>Judul Aduan</label>
									</div>
                                    <input type="hidden" name="id_aduan" value="<?= $detail['id_aduan']?>">
                                    <input type="hidden" name="nik" value="<?= $detail['nik']?>">
									<div class="col-md-8 form-group">
										<input disabled class="form-control" type="text"
											value="<?= $detail['judul']?>">
									</div>
									<div class="col-md-4">
										<label>Bukti Foto</label>
									</div>
									<div class="col-md-8 form-group">
                                        <img class="img-fluid" width="250" src="<?= base_url('./assets/images/aduan/'). $detail['foto']?>" alt="">
									</div>
									<div class="col-md-4">
										<label>Deskripsi Aduan</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group with-title mb-3">
											<textarea disabled class="form-control" rows="3"><?= $detail['isi']?></textarea>
											<label>Deskripsi Aduan</label>
										</div>
									</div>
									<div class="col-md-4">
										<label>Tanggapi Aduan</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group with-title mb-3">
											<textarea class="form-control" name="tanggapan" rows="3" required></textarea>
											<label>Tanggapi Aduan</label>
										</div>
									</div>
									<div class="col-md-4">
										<label>Validasi</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group with-title mb-3">    
                                            <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="status" required>
                                            <option selected>Pilih</option>
                                            <option value="p" class="text-success">Diterima</option>
                                            <option value="t" class="text-danger">Ditolak</option>
                                        </select>
                                    </fieldset>
											</div>
									</div>
                                
                                    

									<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-primary me-1 mb-1" type="submit" 
											>Tanggapi</button>
										<a href="<?=  base_url('Admin/Aduan_masuk')?>" class="btn btn-danger me-1 mb-1" type="submit" 
											>Kembali</a>
										</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
