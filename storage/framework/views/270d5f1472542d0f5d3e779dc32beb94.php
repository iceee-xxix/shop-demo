
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <!-- <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
                        <emoji-picker></emoji-picker>
                        <input id="emojiInput" type="text" placeholder="ใส่อีโมจิที่นี่" style="font-size: 24px; padding: 10px; width: 280px;"> -->
                        <a href="<?php echo e(route('CategoryCreate')); ?>" class="btn btn-sm btn-outline-success d-flex align-items-center" style="font-size:14px">เพิ่มหมวดหมู่&nbsp;<i class="bx bxs-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>หมวดหมู่</th>
                                    <th class="text-center">emoji</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script>
    var language = '<?php echo e(asset("assets/js/datatable-language.js")); ?>';
    $(document).ready(function() {
        $("#myTable").DataTable({
            language: {
                url: language,
            },
            processing: true,
            ajax: {
                url: "<?php echo e(route('categorylistData')); ?>",
                type: "post",
                data: function(d) {
                    d.keyword = $('#keyword').val();
                    d.selectBookregist = $('#selectBookregist').val();
                    d.selectBookregist_parent = $('#selectBookregist_parent').val();
                },
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
            },
            columns: [{
                    data: 'name',
                    class: 'text-left',
                    width: '60%'
                },
                {
                    data: 'icon',
                    class: 'text-center',
                    width: '20%',
                    orderable: false
                },
                {
                    data: 'action',
                    class: 'text-center',
                    width: '20%',
                    orderable: false
                },
            ]
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/category.blade.php ENDPATH**/ ?>