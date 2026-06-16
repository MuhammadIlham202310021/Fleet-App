<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total User</h5>
                <h2><?= $totalUser ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body">
            <h5>Total Department</h5>
            <h2><?= $totalDepartment ?></h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body">
            <h5>User IT</h5>
            <h2><?= $itUser ?></h2>
        </div>
    </div>
</div>

<canvas id="activityChart"></canvas>

<script>

const ctx =
document.getElementById('activityChart');

new Chart(ctx,{
    type:'bar',
    data:{
        labels:['Jan','Feb','Mar','Apr'],
        datasets:[{
            label:'Aktivitas',
            data:[10,20,15,30]
        }]
    }
});

</script>

<?= $this->endSection() ?>