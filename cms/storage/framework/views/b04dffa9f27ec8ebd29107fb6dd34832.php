<?php $__env->startSection('admin-magang'); ?>
    <div class="row">

        <div class="col-lg-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Info!</strong> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-8">
            <a href="/dashboard/produk/create" class="btn btn-success"><span data-feather='plus-circle'></span>
                Tambah</a>
        </div>
        <div class="col-lg-4">
            <form action="/dashboard/produk" method="get">
                <div class="input-group flex-nowrap">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control"
                        placeholder="Cari" aria-label="Username">
                    <button type="submit" class="input-group-text btn btn-outline-success"><span
                            data-feather="search"></span></button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="">
                        <td scope="row"><?php echo e($loop->iteration); ?> </td>
                        <td><?php echo e($item->kode); ?></td>
                        <td><?php echo e($item->nama_produk); ?></td>
                        <td><?php echo e($item->harga); ?></td>
                        <td><?php echo e($item->kategori->kategori); ?></td>
                        <td>
                            <?php if($item->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" style="max-height: 150px"
                                    class="img-fluid mt-2 d-block" alt="<?php echo e($item->name); ?>">
                            <?php else: ?>
                                <img src="https://source.unsplash.com/1200x400? <?php echo e($item->name); ?>" class="img-fluid mt-2"
                                    alt="<?php echo e($item->name); ?>">
                            <?php endif; ?>
                        </td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <td>
                                <a href="/dashboard/produk/<?php echo e($item->kode); ?>/edit" class="badge bg-primary"><span
                                        data-feather="edit"></span></a>

                                <form action="/dashboard/produk/<?php echo e($item->kode); ?>" method="post" class="d-inline">
                                    <!-- Timpa method post menjadi delete -->
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        onclick="return confirm('Apakah anda yakin ingin hapus ? <?php echo e($item->name); ?>')"
                                        class="badge bg-danger border-0">
                                        <span data-feather="x-circle">
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <!--Menampilkan page/halaman-->
        <?php echo e($produks->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/produk/index.blade.php ENDPATH**/ ?>