<?php echo csrf_field(); ?>
<div class="form-group">
    <label for="parent_id">Parent Category</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value>Not set</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($category) && $category->parent && $rowCategory->id == $category->parent->id): ?>
                <option value="<?php echo e($rowCategory->id); ?>" selected><?php echo e($rowCategory->name); ?></option>
            <?php else: ?>
                <option value="<?php echo e($rowCategory->id); ?>"><?php echo e($rowCategory->name); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if($errors->first('parent_id')): ?>
        <span class="text-danger">
          <?php echo e($errors->first('parent_id')); ?>

        </span>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo e(isset($category)?$category->name : ''); ?>">
    <?php if($errors->first('name')): ?>
        <span class="text-danger">
          <?php echo e($errors->first('name')); ?>

        </span>
    <?php endif; ?>

</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
        <?php echo e(isset($category)?$category->description : ''); ?>

    </textarea>
    <?php if($errors->first('description')): ?>
        <span class="text-danger">
          <?php echo e($errors->first('description')); ?>

        </span>
    <?php endif; ?>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
<?php /**PATH C:\Users\Lenovo\full-stack-mshop-master\resources\views/admin/category/form.blade.php ENDPATH**/ ?>