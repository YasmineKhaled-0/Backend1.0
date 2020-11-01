<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_id">Client Name</label>
            <select name="client_id" id="client_id" class="form-control">
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($client->id); ?>"
                        <?php echo e(old('client_id') == $client->id ? 'selected' : ''); ?>>
                        <?php echo e($client->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->first('client_id')): ?>
                <span class="text-danger">
          <?php echo e($errors->first('client_id')); ?>

        </span>
            <?php endif; ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Order Date</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo e(old('date')); ?>">
            <?php if($errors->first('date')): ?>
                <span class="text-danger">
                  <?php echo e($errors->first('date')); ?>

                </span>
            <?php endif; ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Products
            <?php if($errors->first('products')): ?>
                <span class="text-danger">
                  <?php echo e($errors->first('products')); ?>

                </span>
            <?php endif; ?>

        </h3>

        <button type="button" class="btn btn-info" id="btn-add-new-product">Add Product</button>
    </div>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="products-list">

        <?php if(old('products')): ?>
            <?php $__currentLoopData = old('products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowId => $rowProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="product-<?php echo e($rowId); ?>">
                    <td>
                        <select name="products[<?php echo e($rowId); ?>][product_id]"
                                class="form-control input-product-product_id"
                                row-id="product-<?php echo e($rowId); ?>">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->id == $rowProduct['product_id']): ?>
                                    <option value="<?php echo e($product->id); ?>" selected data-price="<?php echo e($product->price); ?>">
                                        <?php echo e($product->name); ?> | <?php echo e($product->price); ?>

                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo e($product->id); ?>" data-price="<?php echo e($product->price); ?>">
                                        <?php echo e($product->name); ?> | <?php echo e($product->price); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->first('products.' . $rowId . '.product_id')): ?>
                            <span class="text-danger">
                              <?php echo e($errors->first('products.' . $rowId . '.product_id')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <input type="number"
                               name="products[<?php echo e($rowId); ?>][quantity]"
                               value="<?php echo e($rowProduct['quantity']?? 1); ?>"
                               row-id="product-<?php echo e($rowId); ?>"
                               class="form-control input-product-quantity">
                        <?php if($errors->first('products.' . $rowId . '.quantity')): ?>
                            <span class="text-danger">
                              <?php echo e($errors->first('products.' . $rowId . '.quantity')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <input type="number"
                               name="products[<?php echo e($rowId); ?>][price]"
                               readonly
                               class="form-control input-product-price"
                               row-id="product-<?php echo e($rowId); ?>"
                               value="<?php echo e($rowProduct['price']?? 1); ?>">
                        <?php if($errors->first('products.' . $rowId . '.price')): ?>
                            <span class="text-danger">
                              <?php echo e($errors->first('products.' . $rowId . '.price')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <input type="number"
                               name="products[<?php echo e($rowId); ?>][total]"
                               readonly
                               class="form-control input-product-total"
                               row-id="product-<?php echo e($rowId); ?>"
                               value="<?php echo e($rowProduct['total'] == 0 ? $rowProduct['price'] : $rowProduct['total']); ?>">

                        <?php if($errors->first('products.' . $rowId . '.total')): ?>
                            <span class="text-danger">
                              <?php echo e($errors->first('products.' . $rowId . '.total')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger row-delete" row-id="product-<?php echo e($rowId); ?>">-</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr id="product-1">
                <td>
                    <select name="products[1][product_id]"
                            class="form-control input-product-product_id"
                            row-id="product-1">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" data-price="<?php echo e($product->price); ?>">
                                <?php echo e($product->name); ?> | <?php echo e($product->price); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td>
                    <input type="number"
                           name="products[1][quantity]"
                           value="1"
                           row-id="product-1"
                           class="form-control input-product-quantity">
                </td>
                <td>
                    <input type="number"
                           name="products[1][price]"
                           readonly
                           class="form-control input-product-price"
                           row-id="product-1"
                           value="<?php echo e($products->first->price); ?>">
                </td>
                <td>
                    <input type="number"
                           name="products[1][total]"
                           readonly
                           class="form-control input-product-total"
                           row-id="product-1"
                           value="<?php echo e($products-> first->price); ?>">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-1">-</button>
                </td>
            </tr>
        <?php endif; ?>

        </tbody>

    </table>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
<?php $__env->startSection('js'); ?>
    <script>

        /**
         * Events
         */
        $(document).on('click', '#btn-add-new-product', function () {
            const rowId = Date.now();
            const productRow = `
            <tr id="product-${rowId}">
                <td>
                    <select name="products[${rowId}][product_id]"
                    row-id="product-${rowId}"
                    class="form-control  input-product-product_id">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" data-price="<?php echo e($product->price); ?>">
                                <?php echo e($product->name); ?> | <?php echo e($product->price); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][quantity]"
                    value="1"
                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][price]"
                    row-id="product-${rowId}"
                    value="<?php echo e($products->first->price); ?>"
                    readonly
                    class="form-control input-product-price">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][total]"
                    row-id="product-${rowId}"
                    readonly
                    value="<?php echo e($products->first->price); ?>"
                    class="form-control input-product-total">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
            $('#products-list').append(productRow);
        });

        $(document).on('click', '.row-delete', function () {
            const rowId = '#' + $(this).attr('row-id');
            $(rowId).remove();
        });

        $(document).on('keyup', '.input-product-quantity', function () {
            const rowId = '#' + $(this).attr('row-id');
            calculateTotal(rowId);
        });

        $(document).on('change', '.input-product-product_id', function () {
            const rowId = '#' + $(this).attr('row-id'),
                price = $(this).children("option:selected").data('price')
            ;
            $(`${rowId} .input-product-price`).val(price);
            calculateTotal(rowId);
        });

        ///////////////////////////
        /**
         * Functions
         */

        /**
         * @param  rowId
         */
        function calculateTotal(rowId) {
            const quantity = $(`${rowId} .input-product-quantity`).val(),
                price = $(`${rowId} .input-product-price`).val(),
                total = price * quantity;

            $(`${rowId} .input-product-total`).val(total);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\Users\Lenovo\full-stack-mshop-master\resources\views/admin/order/form.blade.php ENDPATH**/ ?>