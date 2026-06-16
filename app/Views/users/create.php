<?= $this->extend('layouts/admin')  ?>
<?=  $this->section('content') ?>

<div class="container-fluid">
    <h3>Tambah User</h3>

    <?php if(session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->get('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/users/store" method="post">
        <div class="mb-3">
            <label>Username</label>

            <input 
                type="text"
                name="username"
                value="<?= old('username') ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Deparment</label>
            <select
                name="department_id"
                class="form-control">

                <option value="">
                    Pilih Department ente
                </option>

                <?php foreach($departments as $department): ?>

                    <option
                        value="<?= $department['id'] ?>">

                        <?= $department['department_name'] ?>

                    </option>

                <?php endforeach ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Password</label>

            <input
                type="password"
                name="password"
                class="form-control">
        </div>

        <button
            type="submit"
            class="btn btn-success">
            Simpan
        </button>
    </form>
</div>

<?= $this->endSection() ?>