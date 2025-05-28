

<?php $__env->startSection('content'); ?>
<h4>Tambah Obat Baru</h4>

<form action="<?php echo e(route('obat.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label>Nama Obat</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="expired_at" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-secondary">Kembali</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/admin/obat/create.blade.php ENDPATH**/ ?>