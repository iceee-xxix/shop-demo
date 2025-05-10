<?php $__env->startSection('title', 'หน้าหลัก'); ?>

<?php $__env->startSection('content'); ?>
<?php

use App\Models\Config;

$config = Config::first();
?>
<style>
    .carousel-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
    }

    .icon-have {

        padding: 5px;
        background: linear-gradient(360deg, var(--primary-color), var(--sub-color));
        object-fit: cover;
        border-radius: 100%;
    }

    .icon-have img {
        width: 50px;
        height: 50px;
    }

    .title-food {
        font-size: 30px;
        font-weight: bold;
        color: <?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;
    }


    .food-box img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 0.5rem;
    }


    .food-label {
        font-size: 18px;
        color: <?= ($config->color_category != '')  ? $config->color_category :  '#ffffff' ?>;
        font-weight: bold;
        text-align: center;
        word-wrap: break-word;
        /* เพิ่มบังคับตัดบรรทัด */
        overflow-wrap: break-word;
        /* รองรับเบราว์เซอร์ใหม่ */
        width: 100%;
        line-height: 0.9;
    }
</style>
<?php if(count($promotion) > 0): ?>
<div id="carouselCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="border-radius: 10px;">
        <?php $__currentLoopData = $promotion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
            <img src="<?php echo e(url('storage/'.$rs->image)); ?>" class="d-block w-100" alt="slide">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
<div class="container mt-1">
    <div class="d-flex flex-column justify-content-center">
        <!-- <div class=" text-start fw-bold fs-5" style="color:<?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>">
            ที่นี่เรามี...
        </div>
        <div class="overflow-x-auto d-flex justify-content-between gap-2 py-2"
            style="overflow-x: auto; white-space: nowrap;">
            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="<?php echo e(asset('icon/icon-4.png')); ?>" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;color:<?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;">wifi ฟรี</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="<?php echo e(asset('icon/icon-1.png')); ?>" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;color:<?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;">ที่จอดรถ</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="<?php echo e(asset('icon/icon-2.png')); ?>" alt="icon" style="padding: 7px;">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;color:<?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;">จ่ายด้วย QR</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="<?php echo e(asset('icon/icon-3.png')); ?>" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 13px;color:<?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;">ห้องน้ำสะอาด</div>
            </div>
        </div> -->
        <div class="title-food">
            หมวดอาหาร
        </div>
        <div class="gap-2 py-2">
            <div class="row py-2">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 mb-2">
                    <div class="food-box">
                        <a href="<?php echo e(route('detail',$rs->id)); ?>" style="text-decoration: none;" class="d-flex flex-column justify-content-center align-items-center">
                            <?php if ($rs['files']) { ?>
                                <img src="<?php echo e(url('storage/'.$rs['files']->file)); ?>" alt="icon">
                            <?php } else { ?>
                                <img src="<?php echo e(asset('foods/default-photo.png')); ?>" alt="icon">
                            <?php } ?>
                            <div class="food-label mt-2"><?php echo e($rs->name); ?></div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.luxury-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/users/main_page.blade.php ENDPATH**/ ?>