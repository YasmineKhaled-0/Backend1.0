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
                            <li class="breadcrumb-item active">All Categories</li>
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
                        <div class="row">
                            <div class="col">
                                <form>
                                    <select name="limit" id="">
                                        <option value="5" <?php echo e(Request::get('limit') == 5? 'selected' : ''); ?>>5</option>
                                        <option value="10" <?php echo e(Request::get('limit') == 10? 'selected' : ''); ?>>10</option>
                                        <option value="25" <?php echo e(Request::get('limit') == 25? 'selected' : ''); ?>>25</option>
                                    </select>
                                    <button type="submit">update</button>
                                </form>
                            </div>
                            <div class="col text-center">
                                <form>
                                    <input type="text" name="search" class="form-control">
                                    <button type="submit" class="btn btn-info">Searching</button>
                                    <a href="<?php echo e(route('admin.categories.index')); ?>">Reset</a>
                                </form>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-success">Create</a>
                            </div>
                        </div>



                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->id); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td>
                                        <?php if($category->parent): ?>
                                            <a href="<?php echo e(route('admin.categories.show', $category->parent)); ?>" class="link-item"><?php echo e($category->parent->name); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.categories.show', $category)); ?>" class="btn btn-info">Show</a>
                                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-primary">Edit</a>
                                        <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="post" class="d-inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <?php echo $categories->links(); ?>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\full-stack-mshop-master\resources\views/admin/category/index.blade.php ENDPATH**/ ?>