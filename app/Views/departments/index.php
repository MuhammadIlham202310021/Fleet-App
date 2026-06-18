<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h3>Departments</h3>

        <a
            href="/departments/create"
            class="btn btn-primary">

            Tambah Department

        </a>

    </div>

    <?php if(session()->getFlashdata('success')): ?>

    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>

    <?php endif; ?>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>
                <th>Department</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($departments as $department): ?>

            <tr>

                <td>
                    <?= $department['id'] ?>
                </td>

                <td>
                    <?= $department['department_name'] ?>
                </td>

                <td>
                    <a 
                        href="/departments/edit/<?= $department['id'] ?>"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a 
                        href="/departments/delete/<?= $department['id'] ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus department ini kamu ?')">
                        Delete
                    </a>
                </td>

            </tr>

            <?php endforeach ?>

        </tbody>

    </table>

    <?= $pager->links() ?>

</div>

<?= $this->endSection() ?>