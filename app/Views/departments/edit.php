<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h3>Edit Department</h3>

    <form 
        action="/department/update/<?= $department['id'] ?>"
        method="post">

        <div class="mb-3">
            <label>Department Name</label>
            <input
                type="text"
                name="department_name"
                class="form-control"
                value="<?= old['department_name'] ?>">
        </div>

        <button
            class="btn btn-success">
            Update
        </button>

    </form>
</div>

<?= $this->endSection() ?>