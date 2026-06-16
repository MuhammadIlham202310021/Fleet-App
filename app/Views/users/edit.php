<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3>Edit User</h3>

    <form action="/users/update/<?= $user['id'] ?>"
        method="post">

        <div class="mb-3">
            <label>Username</label>

            <input 
                type="text"
                name="username"
                value="<?= $user['username'] ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select
                name="department_id"
                class="form-control">

                <?php foreach($departments as $department): ?>

                    <option
                        value="<?= $department['id'] ?>"

                        <?= $department['id'] 
                        == $user['department_id']
                        ? 'selected'
                        : '' ?>
                    >

                        <?= $department['department_name'] ?>
                    </option>

                <?php endforeach ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Password Baru</label>

            <input 
                type="password"
                name="password"
                class="form-control">

            <small>
                Kosongkan jika tidak ingin mengganti password
            </small>
        </div>

        <button
            class="btn btn-success">
            Update
        </button>


    </form>
</div>

<?= $this->endSection() ?>