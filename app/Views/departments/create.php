<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <h3>Tambah Department</h3>

    <form
        action="/departments/store"
        method="post">

        <div class="mb-3">

            <label>Department Name</label>

            <input
                type="text"
                name="department_name"
                class="form-control">

        </div>

        <button
            class="btn btn-success">

            Simpan

        </button>

    </form>

</div>

<?= $this->endSection() ?>