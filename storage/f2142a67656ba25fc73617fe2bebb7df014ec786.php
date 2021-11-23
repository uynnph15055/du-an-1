
<?php $__env->startSection('title', 'Danh sách bình luận'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .warning-bg {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        margin-top: 150px;
    }

    .warning {
        text-align: center;
        align-items: center;
    }

    .warning i {
        font-size: 100px;
    }
</style>
<div class="container">

    <?php if(empty($dataComment)): ?>
    <div class="warning-bg">
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i>
            <br>
            <br>
            <h5>Hiện chưa có bình luận !!!</h5>

        </div>
    </div>
    <?php else: ?>

    <h4 style="padding-top:20px" class="text-center">Danh sách bình luận</h4>
    <div class="header__list">


    </div>
    <span style="float:right;font-style:italic">Tổng có : <?php echo e($number); ?> bình luận</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Nội dung</th>
                <th>Bài Học</th>
                <th>Ngày Cmt</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <form action="xoa-binh-luan-where-checkbox" method="POST">


                <?php
                $index = 1;
                ?>
                <?php $__currentLoopData = $dataComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="lesson_id" value="<?php echo e($key['lesson_id']); ?>">
                <tr>
                    <td><input type='checkbox' name='name[]' id='check_all' value='<?= $key['cmtt_id'] ?>' /></td>
                    <td><?= $index++ ?></td>
                    <td><?php echo e($key['student_name']); ?></td>
                    <td><?php echo e($key['comment_content']); ?></td>
                    <td><?php echo e($key['lesson_name']); ?></td>
                    <td><?php echo e($key['date_post']); ?></td>

                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận  này ?')" href="xoa-binh-luan?lesson_id=<?php echo e($key['lesson_id']); ?>&cmtt_id=<?php echo e($key['cmtt_id']); ?>"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <input class="btn btn-info" type="button" id="btn1" value="Chọn hết" />
    <input class="btn btn-warning" type="button" id="btn2" value="Bỏ chọn" />
    <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa các bình luận này ?')"><i class="fas fa-trash"></i></button>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i = 1 ; $i <=$page ; $i++): ?> <li class="page-item"><a class="page-link" href="?trang=<?php echo e($i); ?>&lesson_id=<?php echo e($key['lesson_id']); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
    </form>
    <?php endif; ?>
</div>
  <script language="javascript">
    // Chức năng chọn hết
    document.getElementById("btn1").onclick = function() {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.getElementById("btn2").onclick = function() {
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('name[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminComment/listAdminComment.blade.php ENDPATH**/ ?>