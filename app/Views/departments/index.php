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

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>
                <th>Department</th>

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

            </tr>

            <?php endforeach ?>

        </tbody>

    </table>

    <?= $pager->links() ?>

</div>

<?= $this->endSection() ?>