<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3>Data Siswa</h3>

    <a href="/students/create"
        class="btn btn-primary mb-3">
        Tambah Siswa
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

    <form method="get" action="/students">
        <div class="row mb-3">
            <div class="col-md-4">
                <input
                    type="text"
                    name="keyword"
                    value="<?= esc($_GET['keyword'] ?? '') ?>"
                    class="form-control"
                    placeholder="Cari Siswa nya dong">
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
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= esc($student['nis'])?></td>
                    <td><?= esc($student['name']) ?></td>
                    <td><?= esc($student['department_name'] ?? '-') ?></td>
                    <td><?= esc($student['birth_date'] ?? '_') ?></td>
                    <td>
                        <a href="/students/edit/<?= $student['id'] ?>"
                            class="btn btn-warning btn-sm">
                            EDIT
                        </a>
                        <a href="/students/delete/<?= $student['id'] ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('yakin ingin menghapus siswa ini?')">
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