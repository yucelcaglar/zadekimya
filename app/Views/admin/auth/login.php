<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/lib/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/lib/sb-admin-2/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5"><div class="card-body p-5">
                <div class="text-center">
                    <a class="login-brand" href="<?= site_url() ?>"><i class="fas fa-oil-can"></i> ZADE PETROKİMYA</a>
                    <h1 class="h4 text-gray-900 mt-3 mb-1">Yönetim paneli</h1>
                    <p class="text-muted mb-4">Devam etmek için giriş yapın.</p>
                </div>
                <?php if (session('error')): ?><div class="alert alert-danger"><?= esc((string) session('error')) ?></div><?php endif; ?>
                <?php if (session('success')): ?><div class="alert alert-success"><?= esc((string) session('success')) ?></div><?php endif; ?>
                <form method="post" action="<?= site_url('yonetim/giris') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group"><label for="email">E-posta</label><input id="email" class="form-control form-control-user" type="email" name="email" value="<?= esc(old('email')) ?>" required autocomplete="email"></div>
                    <div class="form-group"><label for="password">Şifre</label><input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="current-password"></div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Giriş Yap</button>
                </form>
            </div></div>
        </div>
    </div>
</div>
</body>
</html>
