
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
</head>

<body>
    <div class="container">
        <div class="col-sm-12 my-5 text-center">
            <h2 class="fw-bold text-green pt-5 mt-5">Tambah Produk</h2>
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
        <form action="<?php echo e(route('store')); ?>" method="POST" enctype="multipart/form-data" class="w-75 d-block mx-auto">
            <?php echo csrf_field(); ?>
            <div class="row">

                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Nama Produk</strong></p>
                        <input type="text" name="nama_product" id="nama_product" class="form-control w-100" placeholder="nama product">
                    </div>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Harga</strong></p>
                        <input type="number" name="harga" id="" class="form-control w-25" placeholder="Harga product">
                    </div>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Deskripsi</strong></p>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group col-sm-12 mt-2">
                    <label for="category_id"><strong>Jenis Bahan</strong></label>
                    <select class="form-select w-50" name="material_id" id="material_id">
                        <option value="" selected>Pilih Jenis Bahan</option>
                        <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" onkeyup="sum();"><?php echo e($data->nama_material); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <p><strong>Gambar</strong></p>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                </div>

                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/product/create.blade.php ENDPATH**/ ?>