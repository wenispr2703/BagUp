
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>

<body>
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
    <h2 class="text-center mt-5 fw-bold pt-5">Semua Produk</h2>
    <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
    <div class="container">
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 d-flex justify-content-center align-content-center ">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col d-flex justify-content-center align-content-center">
                <div class="card" style="width: 18rem;" data-aos="zoom-out" data-aos-delay="300">
                    <img src="products/<?php echo e($data->gambar); ?>" class="card-img-top mx-auto pt-2" style="width: 175px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($data->nama_product); ?></h5>
                        <p class="card-text"><?php echo e($data->deskripsi); ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Rp <?php echo e(number_format($data->harga)); ?></b></li>
                    </ul>
                    <div class="card-body text-center ">
                        <a href="<?php echo e(route('show', $data->id)); ?>" class="card-link text-decoration-none text-brown">Lebih lengkap</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</body>

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/product.blade.php ENDPATH**/ ?>