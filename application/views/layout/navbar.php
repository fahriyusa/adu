<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>
	<div class="col-12">
		<div class="card">
			<div class="card-body py-4 px-4">
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
		<div class="col-12">
				<div class="row">
                    <!-- Content disini bro -->