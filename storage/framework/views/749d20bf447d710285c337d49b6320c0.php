

<?php $__env->startSection('title', $obat->nama); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row">
        
        <div class="col-md-6 text-center">
            <img src="<?php echo e(asset('storage/' . $obat->gambar)); ?>" alt="<?php echo e($obat->nama); ?>" class="img-fluid rounded" style="max-height: 400px;">
        </div>

        
        <div class="col-md-6">
            <h2 class="fw-bold"><?php echo e($obat->nama); ?></h2>

            <p class="text-muted mt-2 mb-3">
                <i class="fas fa-check-circle text-success me-1"></i> Produk Ini Tidak Kedaluwarsa
            </p>

            <h4 class="text-primary fw-semibold">Rp <?php echo e(number_format($obat->harga, 0, ',', '.')); ?></h4>

            <p class="mt-4"><?php echo e($obat->deskripsi); ?></p>

            
            <form action="<?php echo e(route('produk.addToCart', $obat->id)); ?>" method="POST" class="mt-4">
                <?php echo csrf_field(); ?>
                <div class="mb-3 d-flex align-items-center">
                    <label for="jumlah" class="me-3">Jumlah:</label>
                    <div class="input-group" style="width: 120px;">
                        <button type="button" class="btn btn-outline-secondary" onclick="ubahJumlah(-1)">-</button>
                        <input type="number" name="jumlah" id="jumlah" class="form-control text-center" value="1" min="1">
                        <button type="button" class="btn btn-outline-secondary" onclick="ubahJumlah(1)">+</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning fw-bold px-4">
                    <i class="fas fa-cart-plus me-2"></i> Masukkan ke Keranjang
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function ubahJumlah(delta) {
        const input = document.getElementById('jumlah');
        let nilai = parseInt(input.value);
        if (!isNaN(nilai)) {
            nilai = Math.max(1, nilai + delta);
            input.value = nilai;
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/produk/show.blade.php ENDPATH**/ ?>