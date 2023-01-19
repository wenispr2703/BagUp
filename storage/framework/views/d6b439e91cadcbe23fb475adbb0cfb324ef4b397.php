

<?php $__env->startSection('content'); ?>
<body class="overflow-hidden bg-brown">
    <div class="bg-register">
        <div class="container">
            <div class="form d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <div class="col-sm-12 px-5 py-3 bg-light text-dark rounded-2 shadow-lg">
                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3 py-1">
                            <img src="<?php echo e(asset('asset/img/logo.png')); ?>" alt="logo" class="d-block mx-auto" style="width: 280px;">
                                <!-- <h2 class="text-center fw-bold mb-4 text-green"><?php echo e(__('Registrasi')); ?></h2> -->
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="name" type="text"
                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                        value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus
                                        placeholder="Nama pengguna">

                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="email" type="email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                        value="<?php echo e(old('email')); ?>" required autocomplete="email"
                                        placeholder="Email Pengguna">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="password" type="password"
                                        class="form-control password <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        required autocomplete="new-password" placeholder="Password">
                                        <span class="input-group-text togglePassword" id="">
                                            <i data-feather="eye" style="cursor: pointer"></i>
                                        </span>

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-sm-12 input-group input-group-sm w-100">
                                    <input id="password-confirm" type="password" class="form-control password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="konfirmasi Password">
                                        <span class="input-group-text togglePassword" id="">
                                            <i data-feather="eye" style="cursor: pointer"></i>
                                        </span>
                                </div>
                                <p class="text-center pt-3">Sudah memiliki akun?<a class="text-green text-decoration-none pt-1"
                                        href="<?php echo e(route('login')); ?>">
                                        <?php echo e(__('Masuk')); ?>

                                    </a></p>
                            </div>
                            <div class="row mb-0">
                                <div class="col-sm-12 text-center pb-5">
                                    <button type="submit" class="css-button-rounded--green mt-1 w-75">
                                        <?php echo e(__('Daftar')); ?>

                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/auth/register.blade.php ENDPATH**/ ?>