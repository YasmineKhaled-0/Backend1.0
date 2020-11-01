

<?php $__env->startSection('title', 'All Orders'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.orders.index')); ?>">Orders</a></li>
                        <li class="breadcrumb-item active">Show Order: <?php echo e($order->id); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="card card-body">
                    
                    <h2>Order : <?php echo e($order->id); ?></h2>
                    <p>Client Name: <?php echo e($order->client->name); ?></p>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Order quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($productdetails->name); ?></td>
                                <td><?php echo e(($productdetails->pivot->price)); ?> $</td>
                                <td><?php echo e(($productdetails->pivot->quantity)); ?></td>
                                <td><?php echo e(( $productdetails->pivot->total)); ?></td>
                                <td><?php echo e($productdetails->pivot->created_at); ?></td>
                                
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>                       
                                     <div class="d-flex justify-content-around">   
                    <h3 class="text-center mt-3 mb-3"> Total amount : <?php echo e(($order->total_amount)); ?>$</h3>
                    <h3 class="text-center mt-3 mb-3"> payment method : <?php echo e(($order->payment_method)); ?></h3>
</div>
                    <a href="<?php echo e(route('admin.orders.edit', $order)); ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
         
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\full-stack-mshop-master\resources\views/admin/order/show.blade.php ENDPATH**/ ?>