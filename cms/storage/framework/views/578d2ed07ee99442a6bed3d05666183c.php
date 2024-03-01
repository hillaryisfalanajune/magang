<header class="navbar navbar-danger sticky-top bg-danger flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Blog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-danger bg-danger w-100 rounded-0 border-0" type="text" placeholder="Search"
        aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link px-3 bg-danger border-0">
                    Logout
                    <span data-feather="log-out"></span>
                </button>
            </form>

        </div>
    </div>
</header>
<?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/dashboard/layouts/header.blade.php ENDPATH**/ ?>