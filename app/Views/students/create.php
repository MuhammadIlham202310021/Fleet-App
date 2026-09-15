<?= $this->extend('layouts/admin')  ?>
<?=  $this->section('content') ?>

<div class="container-fluid">
    <h3>Tambah Siswa</h3>

    <?php if(session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->get('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/students/store" method="post">
        <div class="mb-3">
            <label>NIS</label>

            <input 
                type="text"
                name="nis"
                value="<?= old('NIS') ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama Siswa</label>

            <input 
                type="text"
                name="name"
                value="<?= old('Name') ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select
                name="department_id"
                class="form-control">

                <option value="">
                    Pilih Kelas Siswa
                </option>

                <?php foreach($departments as $department): ?>

                    <option
                        value="<?= $department['id'] ?>"
                        <?= old('department_id') == $department['id'] ? 'selected' : '' ?>>
                        <?= $department['department_name'] ?>
                    </option>
                <?php endforeach ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input
                type="date"
                name="birth_date"
                value="<?= old('birth_date') ?>"
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