<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?? 'Dashboard' ?></title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <link
            rel="stylesheet"
            href="<?= base_url('assets/css/admin.css') ?>">
    </head>

    <body>
        <div class="wrapper">
        <!-- Sidebar -->
         <?= $this->include('partials/sidebar') ?>
         <!-- Main Area -->
          <div class="main">
            <?= $this->include('partials/navbar') ?>
            <div class="content">
                <?= $this->renderSection('content') ?>
            </div>
            <?= $this->include('partials/footer') ?>
          </div>
         </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </body>
</html>
