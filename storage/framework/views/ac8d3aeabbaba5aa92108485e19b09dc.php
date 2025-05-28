

<?php $__env->startSection('title', 'Profil Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">
          <h4 class="fw-bold mb-4 text-center">Profil Pengguna</h4>

          <div class="d-flex align-items-center mb-4">
            <div class="me-4">
              <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(Auth::user()->name)); ?>&background=0D8ABC&color=fff&size=100" 
                   class="rounded-circle border border-2" width="100" height="100" alt="Avatar">
            </div>
            <div>
              <h5 class="mb-1"><?php echo e(Auth::user()->name); ?></h5>
              <p class="mb-0 text-muted"><?php echo e(Auth::user()->email); ?></p>
            </div>
          </div>

          <hr>

          <div class="mb-3">
            <label class="form-label fw-semibold">Nama Lengkap</label>
            <div class="form-control bg-light"><?php echo e(Auth::user()->name); ?></div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <div class="form-control bg-light"><?php echo e(Auth::user()->email); ?></div>
          </div>

          <?php if(Auth::user()->alamat): ?>
          <div class="mb-3">
            <label class="form-label fw-semibold">Alamat</label>
            <div class="form-control bg-light"><?php echo e(Auth::user()->alamat); ?></div>
          </div>
          <?php endif; ?>

          <div class="d-flex justify-content-between mt-4">
            <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-outline-primary">
              <i class="fas fa-edit me-1"></i> Edit Profil
            </a>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt me-1"></i> Keluar
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/user/profile.blade.php ENDPATH**/ ?>