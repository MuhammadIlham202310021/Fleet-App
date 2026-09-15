<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3>Edit Siswa</h3>

    <?php if(session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->get('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/students/update/<?= $student['id'] ?>" method="post">

        <div class="mb-3">
            <label>NIS</label>
            <input 
                type="text"
                name="nis"
                value="<?= esc($student['nis']) ?>"
                class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Nama Siswa</label>
            <input 
                type="text"
                name="name"
                value="<?= esc($student['name']) ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select
                name="department_id"
                class="form-control">

                <?php foreach($departments as $department): ?>
                    <option
                        value="<?= $department['id'] ?>"
                        <?= $department['id'] 
                        == $student['department_id']
                        ? 'selected': '' ?>
                    >
                        <?= $department['department_name'] ?>
                    </option>
                <?php endforeach ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir baru</label>

            <input 
                type="date"
                name="birth_date"
                value="<?= esc($student['birth_date']) ?>"
                class="form-control">
        </div>

        <button
            type="submit"
            class="btn btn-success">
            Update
        </button>
    </form>
</div>

<?= $this->endSection() ?>