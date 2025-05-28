

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Total Obat</h2>
        <p class="text-2xl font-bold"><?php echo e($totalObat); ?></p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Transaksi Hari Ini</h2>
        <p class="text-2xl font-bold"><?php echo e($transaksiHariIni); ?></p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Total Pengguna</h2>
        <p class="text-2xl font-bold"><?php echo e($totalPengguna); ?></p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg">Pendapatan Hari Ini</h2>
        <p class="text-2xl font-bold">Rp<?php echo e(number_format($pendapatanHariIni, 0, ',', '.')); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>