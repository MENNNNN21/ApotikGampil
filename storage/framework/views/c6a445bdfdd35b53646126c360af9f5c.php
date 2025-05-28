

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Manajemen Obat</h1>

    <div class="d-flex justify-content-between mb-3">
        <form action="<?php echo e(route('obat.index')); ?>" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari nama obat..." value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-outline-secondary">Cari</button>
        </form>
        <a href="<?php echo e(route('obat.create')); ?>" class="btn btn-primary">+ Tambah Obat</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Expired</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($i + 1); ?></td>
                    <td><?php echo e($obat->nama); ?></td>
                    <td><?php echo e($obat->kategori); ?></td>
                    <td><?php echo e($obat->stok); ?></td>
                    <td>Rp<?php echo e(number_format($obat->harga, 0, ',', '.')); ?></td>
                    <td><?php echo e($obat->expired_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('obat.edit', $obat->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('obat.destroy', $obat->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus obat ini?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="7" class="text-center">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/admin/obat/index.blade.php ENDPATH**/ ?>