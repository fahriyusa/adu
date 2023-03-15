<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="stylesheet" href="<?= base_url('./assets')?>/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('./assets')?>/css/pages/auth.css">
    <!-- <link rel="shortcut icon" href="<?= base_url('./assets')?>/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('./assets')?>/images/logo/favicon.png" type="image/png"> -->
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12 mt-4">
        <div id="auth-left">
           <?=
            $this->session->flashdata('pesan');
            ?>
            <h1 class="auth-title">Masuk</h1>
            <p class="auth-subtitle mb-5">Masuk Untuk Mengajukan Aduan Anda </p>
           

            <form action="<?= base_url('Auth/Admin')?>" method="POST">
                <div class="form-group position-re  lative has-icon-left mb-4">
                    <input type="text" value="<?= set_value('username')?>" class="form-control form-control" placeholder="Username" name="username">
                    <small class="text-danger"><?= form_error('username')?></small>
                    <div class="form-control-icon">
                        <!-- <i class="bi bi-person"></i> -->
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" value="<?= set_value('password')?>" class="form-control form-control" name="password" placeholder="Password">
                    <small class="text-danger"><?= form_error('password')?></small>
                    <div class="form-control-icon">
                        <!-- <i class="bi bi-shield-lock"></i> -->
                    </div>
                </div>
              
                <button class="btn btn-primary btn-block shadow mt-3">Masuk</button>
            </form>
             
              <div class="text-center mt-2 ">
                <p class="text-gray-600">Login Sebagai Masyarakat? <a href="<?= base_url('Auth/login')?>" class="font-bold">Masuk</a>.</p>
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
