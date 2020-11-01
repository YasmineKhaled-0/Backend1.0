<?php $__env->startSection('title', 'All Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">admin</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.categories.index')); ?>">categories</a></li>
                            <li class="breadcrumb-item active">Show Category: <?php echo e($category->name); ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-body">
                        <h2>Title: <br> <?php echo e($category->name); ?></h2>
                        <p>Description: <br> <?php echo e($category->description); ?></p>
                        <?php if($category->parent): ?>
                            Parent: <a href="<?php echo e(route('admin.categories.show', $category->parent)); ?>"><?php echo e($category->parent->name); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\full-stack-mshop-master\resources\views/admin/category/show.blade.php ENDPATH**/ ?>