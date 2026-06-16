
<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>

<div class="login-wrapper">

    <div class="overplay"></div>

    <div class="login-card">

        <div class="text-center mb-4">
            <i class="fa-solid fa-user-shield login-logo"></i>
            <h3 class="mt-3">FLEET MANAGEMEN</h3>
            <p class="text-muted">
                Sign in to continue
            </p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?=  session()->getFlashdata('error') ?>
        </div>

        <?php endif; ?>

        <form action="/login/process" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input
                    type="text"
                    name='username'
                    class="form-control">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input
                    type="password"
                    name='password'
                    class="form-control">
            </div>

            <button 
                class="btn btn-primary w-100">
                Login
            </button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>