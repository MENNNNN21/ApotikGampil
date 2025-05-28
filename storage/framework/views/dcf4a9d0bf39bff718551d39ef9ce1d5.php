



<?php $__env->startSection('title', 'Keranjang Belanja'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4 text-white p-3 rounded position-relative shadow-sm" style="background-color: #A0E9FF"> 
    <a href="<?php echo e(url('/produk')); ?>" class="btn btn-light btn-sm position-absolute start-0 top-50 translate-middle-y ms-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0 text-center fw-bold text-black">Keranjang Belanja</h5>
</div>

<div class="container py-4">

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(count($cartItems) === 0): ?>
        <p class="text-center text-muted">Keranjang Anda kosong.</p>
    <?php else: ?>
        <div class="table-responsive mb-4">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            // Pastikan $item->obat ada sebelum mengakses propertinya
                            if ($item->obat) {
                                $subtotal = $item->obat->harga * $item->jumlah; // Gunakan $item->jumlah sesuai kode Anda
                                $total += $subtotal;
                            } else {
                                $subtotal = 0; // Atau handle jika obat tidak ditemukan
                            }
                        ?>
                        <tr>
                            <td class="d-flex align-items-center">
                                <?php if($item->obat): ?>
                                    <img src="<?php echo e(asset('storage/obat/' . $item->obat->gambar)); ?>" alt="<?php echo e($item->obat->nama); ?>" width="60" class="me-3">
                                    <span><?php echo e($item->obat->nama); ?></span>
                                <?php else: ?>
                                    <span>Produk Tidak Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>Rp <?php echo e($item->obat ? number_format($item->obat->harga, 0, ',', '.') : 'N/A'); ?></td>
                            <td style="max-width: 120px;">
                                <form action="<?php echo e(route('cart.update', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    
                                    <input type="number" name="jumlah" class="form-control form-control-sm" value="<?php echo e($item->jumlah); ?>" min="1" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></td>
                            <td>
                                <form action="<?php echo e(route('cart.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        
        
        <div class="d-flex justify-content-end">
            <div class="text-end">
                <h5 class="fw-bold">Total: Rp <?php echo e(number_format($total, 0, ',', '.')); ?></h5>

                
                <?php
                    // GANTI DENGAN NOMOR WHATSAPP ANDA (gunakan format 628xxxx)
                    $whatsappNumber = '6282121141523'; // <--- GANTI NOMOR INI

                    // Mulai membuat pesan
                    $message = "Halo,\nSaya ingin memesan item berikut dari keranjang belanja:\n\n";

                    // Tambahkan setiap item ke pesan
                    foreach($cartItems as $item) {
                        if ($item->obat) {
                            // Pastikan $item->obat->nama dan $item->jumlah sudah benar
                            $message .= "- " . $item->obat->nama . " (Jumlah: " . $item->jumlah . ")\n";
                        }
                    }

                    // Tambahkan total pembayaran
                    $message .= "\nTotal Pembayaran: Rp " . number_format($total, 0, ',', '.');
                    $message .= "\n\nMohon konfirmasi pesanan saya. Terima kasih!";

                    // Buat URL WhatsApp (pesan akan di-encode secara otomatis)
                    $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($message);
                ?>

                
                <a href="<?php echo e($whatsappUrl); ?>"
                   class="btn btn-success mt-3 px-4"
                   target="_blank"
                   onclick="return confirm('Anda akan diarahkan ke WhatsApp untuk menyelesaikan pesanan. Lanjutkan?');">
                    <i class="fas fa-credit-card me-1"></i> Checkout
                </a>

                

            </div>
        </div>
        
        
        

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/cart.blade.php ENDPATH**/ ?>