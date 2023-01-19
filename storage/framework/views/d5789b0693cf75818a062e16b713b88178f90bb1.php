
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <?php if(Auth::user()->role_as == '1'): ?>
    <h2 class="text-center fw-bold pt-5">Halaman Admin</h2>
    <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Produk Pesanan</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">

                <td scope="col">No</td>
                <td scope="col">ID Pemesan</td>
                <td scope="col">Nama produk</td>
                <td scope="col" width="150">harga</td>
                <td scope="col" width="400">warna</td>
                <td scope="col">jumlah</td>
                <td scope="col" width="300">ukuran</td>
                <td scope="col" width="100">Status pembayaran</td>
                <td scope="col" width="100">Status pesanan</td>
                <td scope="col" width="300">Total harga</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($cart->user_id); ?></td>
                <td><?php echo e($cart->nama_product); ?></td>
                <td><?php echo e($cart->harga); ?></td>
                <td><?php echo e($cart->color->nama_warna); ?></td>
                <td><?php echo e($cart->quantity); ?></td>
                <td><?php echo e($cart->size->nama_ukuran); ?></td>
                <td><?php echo e($cart->pembayaran->nama_pembayaran); ?></td>
                <td><?php echo e($cart->status->nama_status); ?></td>
                <td><?php echo e($cart->total_cost); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Pesanan Custom</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col">Nama</td>
                <td scope="col" width="150">alamat</td>
                <td scope="col" width="400">Desain totebag</td>
                <td scope="col">Jenis Bahan</td>
                <td scope="col" width="150">Ukuran</td>
                <td scope="col" width="100">Status pembayaran</td>
                <td scope="col" width="100">Status pesanan</td>
                <td scope="col" width="300">Total bayar</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($order->customer->nama); ?></td>
                <td><?php echo e($order->customer->alamat); ?></td>
                <td><img src="file/<?php echo e($order->design); ?>" class="img-fluid rounded-start w-50"></td>
                <td><?php echo e($order->material->nama_material); ?></td>
                <td><?php echo e($order->size->nama_ukuran); ?></td>
                <td><?php echo e($order->pembayaran->nama_pembayaran); ?></td>
                <td><?php echo e($order->status->nama_status); ?></td>
                <td><?php echo e(number_format($order->material->harga * $order->quantity)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Konfirmasi pembayaran</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col">ID pesanan</td>
                <td scope="col" width="150">Nama pengirim</td>
                <td scope="col" width="400">Bukti pembayaran</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $confirm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($pesan->id_pesanan); ?></td>
                <td><?php echo e($pesan->nama_pengirim); ?></td>
                <td><img src="konfir/<?php echo e($pesan->foto); ?>" class="img-fluid rounded-start w-25"></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Data pelanggan</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">

                <td scope="col">No</td>
                <td scope="col">User_id</td>
                <td scope="col">Nama</td>
                <td scope="col" width="150">Alamat</td>
                <td scope="col" width="200">No. Telepon</td>
                <td scope="col">Email</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($orang->user_id); ?></td>
                <td><?php echo e($orang->nama); ?></td>
                <td><?php echo e($orang->alamat); ?></td>
                <td><?php echo e($orang->hp); ?></td>
                <td><?php echo e($orang->email); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php else: ?>
    <div class="container position-fixed">
        <div class="text-center d-flex justify-content-center w-100 flex-column vh-100">
            <div class="row main mx-auto py-5 px-4" style="width: 500px;">
            <img src="<?php echo e(asset('asset/img/not-found.svg')); ?>" class="img-fluid animated" alt="gambar">
                <h2 class="fw-bold mt-3">Error not found</h2>
                <p class="text-muted">Silahkan kembali ke halaman utama</p>
                <button class="btn btn-primary d-block mx-auto" style="width: 200px;"><a href="<?php echo e(url('/home')); ?>" class="text-light text-decoration-none">Back to Home</a></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/order.blade.php ENDPATH**/ ?>