<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/produk*') ? 'active' : ''); ?>" href="/dashboard/produk">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Produk
                </a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " aria-current="page"
                    href="/dashboard/categories">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Customer
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " aria-current="page"
                    href="/dashboard/categories">
                    <span data-feather="file" class="align-text-bottom"></span>
                   Seller
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " aria-current="page"
                    href="/dashboard/categories">
                    <span data-feather="file" class="align-text-bottom"></span>
                   Setting
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/dashboard/layouts/nav.blade.php ENDPATH**/ ?>