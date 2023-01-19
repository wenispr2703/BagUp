

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
</head>
<body class="overflow-hidden">
<section id="hero">

<div class="container mt-5">
    <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
            <div data-aos="zoom-out">
                <h1>Totebag stylist kece kekinian <span>BagUp</span></h1>
                <h2>Berbagai macam dan jenis totebag tersedia disiniiii</h2>
                <div class="text-center text-lg-start">
                    <a href="<?php echo e(route('product')); ?>" class="css-button-rounded--green text-decoration-none text-center">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
            <img src="<?php echo e(asset('asset/img/landing.png')); ?>" class="img-fluid animated" alt="gambar">
        </div>
    </div>
</div>
</section><!-- End Hero -->
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/home.blade.php ENDPATH**/ ?>