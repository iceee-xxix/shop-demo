<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <form action="<?php echo e(route('CategorySave')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <div class="card-header">
                                    แก้ไขหมวดหมู่
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">ชื่อหมวดหมู่ : </label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $info->name)); ?>">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="file" class="form-label">รูปภาพหมวดหมู่ : </label>
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" id="file" name="file">
                                                <a href="<?php echo e(($info['files']) ? url('storage/'.$info['files']->file) : 'javascript:void(0);'); ?>" 
                                                <?php echo e(($info['files']) ? 'target="_blank" ' : ''); ?>

                                                class="btn btn-outline-secondary" type="button"><i class="bx bx-search-alt-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo e(old('id', $info->id)); ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/category/edit.blade.php ENDPATH**/ ?>