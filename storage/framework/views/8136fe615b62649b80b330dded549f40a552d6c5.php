

<?php $__env->startSection('content'); ?>

<div class="container">
    <h2 class="text-center fw-bold mt-5 pt-5">Pesanan Saya</h2>
    <div class="custom-separator mx-auto my-3 mb-4 bg-brown"></div>


    <div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-4">
        <div class="bg-light shadow-sm pt-4 pb-4 px-4 my-5">
            <ul style="list-style: none; padding:0;">
                <li><Strong>ID Pesanan : <?php echo e($data->id); ?></Strong></li>
                <li><b>Nama :</b> <?php echo e($data->nama_product); ?></li>
                <li><b>Size :</b> <?php echo e($data->size->nama_ukuran); ?></li>
                <li><b>Warna :</b> <?php echo e($data->color->nama_warna); ?></li>
                <li><b>Jumlah :</b> <?php echo e($data->quantity); ?></li>
                <li><b>Status Orderan :</b> <?php echo e($data->status->nama_status); ?></li>
                <li><b>Status pembayaran :</b> <?php echo e($data->pembayaran->nama_pembayaran); ?></li>
                <li><b>Total harga :</b> Rp.
                <?php echo e(number_format($data->total_cost)); ?></li>

                
            </ul>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-4">
        <div class="bg-brown text-light shadow-sm pt-4 pb-4 px-4 my-5">
            <ul style="list-style: none; padding:0;">
                <li><Strong>ID Pesanan : <?php echo e($data->id); ?></Strong></li>
                <li><b>Nama :</b> <?php echo e($data->customer->nama); ?></li>
                <li><b>Size :</b> <?php echo e($data->size->nama_ukuran); ?></li>
                <li><b>Warna :</b> <?php echo e($data->color->nama_warna); ?></li>
                <li><b>Jumlah :</b> <?php echo e($data->quantity); ?></li>
                <li><b>Status Orderan :</b> <?php echo e($data->status->nama_status); ?></li>
                <li><b>Status pembayaran :</b> <?php echo e($data->pembayaran->nama_pembayaran); ?></li>
                <li><b>Total harga :</b> Rp.
                <?php echo e(number_format($data->material->harga * $data->quantity)); ?></li>
            </ul>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/myorder.blade.php ENDPATH**/ ?>