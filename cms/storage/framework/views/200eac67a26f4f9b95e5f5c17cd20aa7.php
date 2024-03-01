<?php $__env->startSection('magang'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <?php if(session('status')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Informasi! </strong><?php echo e(session('status')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('loginError')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Informasi! </strong><?php echo e(session('loginError')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <main class="form-signin w-100 m-auto">
                <form method="POST" action="/login" class="login-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

                    <div class="form-floating">
                        <input type="email" name="email" required class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        <div class="invalid-feedback">
                            Silahkan isi Email.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" required class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <div class="invalid-feedback">
                            Silahkan isi Password.
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                </form>
                <small class="d-block text-center mt-2">
                    Buat Akun Baru <a href="/register" class="text-decoration-none">Register</a>
                </small>
            </main>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.login-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/login/index.blade.php ENDPATH**/ ?>