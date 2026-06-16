<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand">
            <?= $title ?? 'Dashboard' ?>
        </span>
        <div>
            <span class="me-3">
                Admin
            </span>
            <button>
                <a href="/logout"
                    class="btn btn-danger btn-sm">
                    Logout keluar wey
                </a>
            </button>
        </div>
    </div>
</nav>