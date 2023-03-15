<section id="basic-horizontal-layouts">
	<div class="row match-height">
		<div class="col col-12">		
			<?=
				$this->session->flashdata('pesan');
				 	?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Ajukan Aduan</h4>
				</div>
			
				<div class="card-content">
					<div class="card-body">
						<form class="form form-horizontal" action="<?= base_url('Aduan/Kirim')?>"  method="POST" enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<div class="col-md-4">
										<label>Judul Aduan</label>
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" name="judul"
											placeholder="Masukkan Judul">
										<small class="text-danger"><?= form_error('judul')?></small>
									</div>

									<div class="col-md-4">
										<label>Bukti Foto</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="file" class="form-control" name="foto">
										<!-- <small class="text-danger"><?= form_error('foto')?></small> -->
									</div>

									<div class="col-md-4">
										<label>Deskripsi Aduan</label>
									</div>
									<div class="col-md-8 form-group">
										<div class="form-group with-title mb-3">
											<textarea class="form-control" name="isi" rows="3"></textarea>
											<small class="text-danger"><?= form_error('isi')?></small>
											<label>Deskripsi Aduan</label>
										</div>
									</div>

									<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-primary me-1 mb-1" type="submit" 
											>Submit</button>
										<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
