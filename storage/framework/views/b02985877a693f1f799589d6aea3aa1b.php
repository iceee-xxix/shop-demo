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
                        <a href="<?php echo e(route('MenuCreate')); ?>" class="btn btn-sm btn-outline-success" style="font-size:14px">เพิ่มเมนู&nbsp;<i class="bx bxs-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>เมนู</th>
                                    <th class="text-center">หมวดหมู่</th>
                                    <th class="text-center">กำหนดราคา</th>
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
                url: "<?php echo e(route('menulistData')); ?>",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
            },
            columns: [{
                    data: 'name',
                    class: 'text-left',
                    width: '40%'
                },
                {
                    data: 'category',
                    class: 'text-center',
                    width: '20%',
                },
                {
                    data: 'price',
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
    $(document).on('click', '.deleteMenu', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: "ท่านต้องการลบเมนูใช่หรือไม่?",
            icon: "question",
            showDenyButton: true,
            confirmButtonText: "ตกลง",
            denyButtonText: `ยกเลิก`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo e(route('menuDelete')); ?>",
                    type: "post",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire(response.message, "", "success");
                            $('#myTable').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire(response.message, "", "error");
                        }
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/menu/index.blade.php ENDPATH**/ ?>