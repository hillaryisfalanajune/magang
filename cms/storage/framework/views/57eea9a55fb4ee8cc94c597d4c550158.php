<?php $__env->startSection('magang'); ?>
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-register w-100 m-auto">
            <form method="POST" action="/register" class="register-validation" novalidate>
              <!--untuk menambah method post tambah csrf (token security)-->
              <?php echo csrf_field(); ?>
              <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>

              <div class="form-floating">
                <input type="text" value="<?php echo e(old('name')); ?>" name="name" required class="form-control rounded-top <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nama</label>
                <div class="invalid-feedback">
                  <?php if($errors->has('name')): ?>
                      <?php echo e($errors->first('name')); ?>

                  <?php else: ?>
                      Silahkan isi Nama.
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-floating">
                <input type="text" value="<?php echo e(old('username')); ?>" name="username" required class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
                <div class="invalid-feedback">
                  <?php if($errors->has('username')): ?>
                      <?php echo e($errors->first('username')); ?>

                  <?php else: ?>
                      Silahkan isi Username.
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-floating">
                <input type="email" value="<?php echo e(old('email')); ?>" name="email" required class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                  <?php if($errors->has('email')): ?>
                      <?php echo e($errors->first('email')); ?>

                  <?php else: ?>
                      Silahkan isi Email.
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-floating">
                <input type="password" name="password" required class="form-control rounded-bottom <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                  <?php if($errors->has('password')): ?>
                      <?php echo e($errors->first('password')); ?>

                  <?php else: ?>
                      Silahkan isi Password.
                  <?php endif; ?>
                </div>
              </div>

              <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-2">
                Halaman <a href="/login" class="text-decoration-none">Login</a>
            </small>
        </main>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.register-validation')

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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT-LARAVEL\barbeq\magang\cms\resources\views/register/index.blade.php ENDPATH**/ ?>