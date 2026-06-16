<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3>User Management</h3>

    <a href="/users/create"
        class="btn btn-primary mb-3">
        Tambah User
    </a>

    <?php if(session()-> getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="get" action="/users">
        <div class="row mb-3">
            <div class="col-md-4">
                <input
                    type="text"
                    name="keyword"
                    value="<?= esc($_GET['keyword'] ?? '') ?>"
                    class="form-control"
                    placeholder="Cari username dong">
            </div>
            <div class="col-md-2">
                <button
                    type="submit"
                    class="btn btn-primary">
                Cari dong
                </button>
            </div>
        </div>

    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <th>Username</th>
            <th>Department</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td>
                        <?= $user['department_name'] ?? '_' ?>
                    </td>
                    <td>
                        <a href="/users/edit/<?= $user['id'] ?>"
                            class="btn btn-warning btn-sm">
                            EDIT
                        </a>
                        <a href="/users/delete/<?= $user['id'] ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('yakin ingin menghapus user ini?')">
                            DELETE
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?= $pager->links() ?>
</div>

<?= $this->endSection() ?>