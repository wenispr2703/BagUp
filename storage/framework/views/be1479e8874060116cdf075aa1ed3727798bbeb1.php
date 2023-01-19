
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <div class="col-sm-12 mt-5 text-center pt-5">
            <h2 class="fw-bold text-green">Custom Design</h2>
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
        <form action="<?php echo e(route('addcustom')); ?>" method="POST" enctype="multipart/form-data" class="w-75 d-block mx-auto">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="form-group col-sm-12 mt-2">
                    <label for="category_id"><strong>Jenis Bahan</strong></label>
                    <select class="form-select w-50" name="material_id" id="material_id">
                        <option value="" selected>Pilih Jenis Bahan</option>
                        <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" onkeyup="sum();"><?php echo e($data->nama_material); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group col-sm-12 mt-2">
                    <label for="size_id"><strong>Ukuran</strong></label>
                    <select class="form-select w-25" name="size_id" id="size_id">
                        <option value="" selected>Pilih Size</option>
                        <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" onkeyup="sum();"><?php echo e($data->nama_ukuran); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group col-sm-12 mt-3">
                    <label for="size_id"><strong>Warna</strong></label>
                    <select class="form-select w-50" name="color_id" id="color_id">
                        <option value="" selected>Pilih Warna</option>
                        <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" onkeyup="sum();"><?php echo e($data->nama_warna); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group col-sm-6 mt-2">
                    <label for="customer_id"><strong>Alamat</strong></label>
                    <select class="form-select" name="customer_id" id="customer_id">
                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" onkeyup="sum();"><?php echo e($data->alamat); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-sm-12 form-group mt-2">
                    <label for="quantity"><strong>Jumlah pesanan</strong></label>
                    <input type="number" name="quantity" id="quantity" class="form-control w-25"
                        placeholder="Jumlah pesanan">
                </div>
                <!-- <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Catatan</strong></p>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"
                            placeholder="Catatan tambahan"></textarea>
                    </div>
                </div> -->
                <div class="col-xs-12 my-sm-2">
                    <p><strong>Design</strong></p>
                    <input type="file" name="design" id="design" class="form-control" accept="image/*">
                </div>
                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BagUp\totebag\resources\views/create.blade.php ENDPATH**/ ?>