<?php $__env->startSection('title', 'เมนู'); ?>

<?php $__env->startSection('content'); ?>
<?php

use App\Models\Config;

$config = Config::first();
?>
<style>
    .title-food {
        font-size: 30px;
        font-weight: bold;
        color: <?= ($config->color_font != '')  ? $config->color_font :  '#ffffff' ?>;
    }

    .card-food {
        background-color: var(--bg-card-food);
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        padding: 4px;
    }


    .card-food img {
        width: 120px;
        height: 90px;
        border-radius: 20px;
    }

    .card-title {
        font-size: 21px;
        font-weight: bold;
    }

    .btn-gray-left {
        background-color: #d3d3d3;
        color: #333;
        border: none;
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
        padding: 0px 14px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .btn-gray-right {
        background-color: #d3d3d3;
        color: #333;
        border: none;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        padding: 0px 14px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .btn-gray-left:hover {
        background-color: #c0c0c0;
        transform: scale(1.05);
    }

    .btn-gray-right:hover {
        background-color: #c0c0c0;
        transform: scale(1.05);
    }

    .count {
        background-color: #e0e0e0;
        padding: 1.5px 0px;
    }
</style>

<div class="container">
    <div class="d-flex flex-column justify-content-center gap-2">
        <div class="title-food">
            หมวดอาหาร
        </div>
        <!-- เมนู 1 -->
        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex justify-content-start align-items-start card-food gap-2">
            <?php if ($rs['files']) { ?>
                <img src="<?php echo e(url('storage/'.$rs['files']->file)); ?>" alt="food" style="width: 100px;">
            <?php } else { ?>
                <img src="<?php echo e(asset('foods/default-photo.png')); ?>" alt="food" style="width: 100px;">
            <?php } ?>
            <div class="d-flex flex-column justify-content-center">
                <div class="card-title text-start">
                    <?php echo e($rs->name); ?>

                </div>

                <?php $__currentLoopData = $rs['option']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between align-items-center gap-2 mb-1">
                    <div><?php echo e($options->type); ?> <?php echo e($options->price); ?></div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn-gray-left" onclick="changeCount(this, -1)" data-name="<?php echo e($rs->name); ?>"
                            data-type="<?php echo e($options->type); ?>" data-id="<?php echo e($rs->id); ?>" data-option="<?php echo e($options->id); ?>" data-price="<?php echo e($options->price); ?>">-</button>
                        <div class="count fw-bold px-2">0</div>
                        <button class="btn-gray-right" onclick="changeCount(this, 1)" data-name="<?php echo e($rs->name); ?>"
                            data-type="<?php echo e($options->type); ?>" data-id="<?php echo e($rs->id); ?>" data-option="<?php echo e($options->id); ?>" data-price="<?php echo e($options->price); ?>">+</button>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script>
    const orderData = JSON.parse(localStorage.getItem('orderData')) || {};;
    console.log(orderData)

    function changeCount(button, amount) {
        const name = button.getAttribute('data-name');
        const type = button.getAttribute('data-type');
        const price = parseFloat(button.getAttribute('data-price'));
        const id = parseFloat(button.getAttribute('data-id'));
        const option = parseFloat(button.getAttribute('data-option'));

        const countEl = button.parentElement.querySelector('.count');
        let count = parseInt(countEl.textContent) || 0;
        count += amount;
        if (count < 0) count = 0;
        countEl.textContent = count;

        // สร้างโครงสร้างถ้ายังไม่มี
        if (!orderData[name]) {
            orderData[name] = {};
        }

        // ถ้ามีอยู่แล้วให้บวกเพิ่ม
        const oldQty = orderData[name][type]?.qty || 0;

        if (count > 0) {
            orderData[name][type] = {
                qty: oldQty + amount,
                price: price,
                id: id,
                option: option
            };
        } else {
            // ถ้าจำนวนเหลือ 0 ให้ลบออกจาก orderData
            delete orderData[name][type];

            // ถ้าไม่มีประเภทอาหารในเมนูนี้แล้ว ลบเมนูทิ้ง
            if (Object.keys(orderData[name]).length === 0) {
                delete orderData[name];
            }
        }

        console.log(orderData);
        goToBuyPage();
    }

    function goToBuyPage() {
        // บันทึกข้อมูล orderData ลงใน localStorage เป็น JSON string
        localStorage.setItem('orderData', JSON.stringify(orderData));

    }

    // โหลดค่าจาก localStorage แล้วแสดงบนหน้า
    function restoreCountsFromStorage() {
        for (const name in orderData) {
            for (const type in orderData[name]) {
                const qty = orderData[name][type].qty;

                // หา button + ที่ตรงกับเมนูนั้นและประเภทนั้น
                const plusButton = document.querySelector(
                    `button[data-name="${name}"][data-type="${type}"][onclick*="changeCount"][class*="btn-gray-right"]`
                );
                if (plusButton) {
                    const countEl = plusButton.parentElement.querySelector('.count');
                    if (countEl) {
                        countEl.textContent = qty;
                    }
                }
            }
        }
    }

    // เรียกตอนโหลดหน้า
    restoreCountsFromStorage();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.luxury-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/users/detail_page.blade.php ENDPATH**/ ?>