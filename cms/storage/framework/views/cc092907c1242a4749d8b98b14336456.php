<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- CSS Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title><?php echo e($title); ?></title>
</head>
<body>

    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Block untuk kontent-->
    <div class="container mt-4">
        <?php echo $__env->yieldContent('magang'); ?>
    </div>

</body>
<!-- Javascript Bootstrap-->
<script src="/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
</html>
<?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/layouts/main.blade.php ENDPATH**/ ?>