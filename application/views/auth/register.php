<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('./assets')?>/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('./assets')?>/css/pages/auth.css">
    <!-- <link rel="shortcut icon" href="<?= base_url('./assets')?>/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('./assets')?>/images/logo/favicon.png" type="image/png"> -->
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
          
            <h1 class="auth-title">Daftar</h1>
            <p class="auth-subtitle mb-2">Daftarkan Akun Anda Untuk Ajukan Aduan.</p>

            <form method="POST" action="<?= base_url('Auth/Daftar')?>">
                <div class="form-group position-relative mt-4">
                    <input value="<?= set_value('nik')?>" type="number" name="nik" class="form-control form-control" placeholder="NIK" >
                    <small class="text-danger"><?= form_error('nik')?></small>
                    <div class="form-control-icon">
                    </div>
                </div>
                <div class="form-group position-relative mt-4">
                    <input value="<?= set_value('nama')?>" type="text" name="nama" class="form-control form-control" placeholder="Nama Lengkap" >
                    <small class="text-danger"><?= form_error('nama')?></small>
                </div>
                <div class="form-group position-relative mt-4">
                    <input value="<?= set_value('tlp')?>" type="number" name="tlp" class="form-control form-control" placeholder="Telphone">
                    <small class="text-danger"><?= form_error('tlp')?></small>
                </div>
                <div class="form-group position-relative mt-4">
                    <input value="<?= set_value('username')?>" type="text" name="username" class="form-control form-control" placeholder="Username">
                    <small class="text-danger"><?= form_error('username')?></small>
                </div>
                <div class="form-group position-relative mt-4">
                    <input type="password" name="password" class="form-control form-control" placeholder="Password">
                    <small class="text-danger"><?= form_error('password')?></small>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn shadow-lg mt-4">Daftar</button>
            </form>
            <div class="text-center mt-4     text-lg fs-4">
                <p class='text-gray-600'>Sudah Memiliki Akun? <a href="<?= base_url('Auth/login')?>" class="font-bold">Masuk</a>.</p>
            </div>
             </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
    </div>
</div>

    </div>
</body>

</html>
