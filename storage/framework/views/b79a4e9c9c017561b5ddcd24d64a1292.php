<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo $__env->yieldContent('title', 'Apotek Gampil'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #198754;
            color: #fff;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 0.75rem 1rem;
            display: block;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #157347;
            border-left: 4px solid #fff;
        }
        .content {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <h5 class="text-center">Admin Panel</h5>
            <hr>
            <a href="/admin/dashboard" class="<?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">Dashboard</a>
            <a href="<?php echo e(route('obat.index')); ?>" class="<?php echo e(request()->routeIs('obat.*') ? 'active' : ''); ?>">Manajemen Obat</a>

            <a href="/admin/transaksi" class="<?php echo e(request()->is('admin/transaksi*') ? 'active' : ''); ?>">Transaksi</a>
            <a href="/logout">Logout</a>
        </div>

        <div class="col-md-10 content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ApotikGampil\resources\views/admin/layout.blade.php ENDPATH**/ ?>