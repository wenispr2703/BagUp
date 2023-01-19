

<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <div class="col-sm-12 mt-5 text-center pt-5">
            <h2 class="fw-bold text-green">Konfirmasi Pembayaran</h2>
            <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
        </div>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Gagal</strong>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php else: ?>

        <?php endif; ?>
        <form action="<?php echo e(route('addconfirm')); ?>" method="POST" enctype="multipart/form-data"
            class="w-75 d-block mx-auto">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>ID pesanan</strong></p>
                        <input type="number" name="id_pesanan" id="" class="form-control" placeholder="ID Pesanan">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Nama pengirim</strong></p>
                        <input type="text" name="nama_pengirim" id="" class="form-control" placeholder="Nama pengirim">
                    </div>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <p><strong>Bukti pembayaran</strong></p>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*" multiple>
                </div>

                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-danger mx-2">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/confirm.blade.php ENDPATH**/ ?>