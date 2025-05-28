

<?php $__env->startSection('content'); ?>
<h4>Edit Obat: <?php echo e($obat->nama); ?></h4>

<form action="<?php echo e(route('obat.update', $obat->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label>Nama Obat</label>
        <input type="text" name="nama" class="form-control" value="<?php echo e($obat->nama); ?>" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"><?php echo e($obat->deskripsi); ?></textarea>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?php echo e($obat->stok); ?>" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?php echo e($obat->harga); ?>" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="expired_at" class="form-control" value="<?php echo e($obat->expired_at->format('Y-m-d')); ?>" required>
    </div>

    <div class="mb-3">
        <label>Gambar Saat Ini:</label><br>
        <?php if($obat->gambar): ?>
            <img src="<?php echo e(asset('storage/obat/' . $obat->gambar)); ?>" alt="Gambar" width="80"><br><br>
        <?php else: ?>
            <span class="text-muted">Belum ada gambar</span><br><br>
        <?php endif; ?>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/admin/obat/edit.blade.php ENDPATH**/ ?>