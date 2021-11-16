
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
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
    <?php if(empty($dataQuestion)): ?>
    <div class="warning-bg">
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i>
            <br>
            <br>
            <h5>Hiện chưa có câu hỏi !!!</h5>
            <a href="trang-them-cau-hoi?lesson_id=<?php echo e($lesson_id); ?>">Thêm câu hỏi</a>
        </div>
    </div>
    <?php else: ?>
    <!--  -->
    <h4 class="text-center">Danh sách câu hỏi</h4>
    <?php if($lesson_id): ?>
    <a class="btn btn-primary" href="trang-them-cau-hoi?lesson_id=<?php echo e($lesson_id); ?>">Thêm câu hỏi</a>
    <?php endif; ?>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="80px">STT</th>
                <th width="400px">Đề bài</th>
                <th width="130px">Ảnh (Nếu có *)</th>
                <th>Đáp án</th>
                <th width="90px">Chạy thử</th>
                <th width="80px">Sửa</th>
                <th width="80px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            <?php foreach ($dataQuestion as $key) {
                $a = explode("/", $key['answer']);
            ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td>
                        <?php echo $key['question'] ?>
                    </td>
                    <td style="text-align: center;">
                        <?php if(isset($key['question_img'])): ?>
                        <img width="70px" src="./public/img/<?php echo e($key['question_img']); ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($key['answer']); ?>

                    </td>
                    <td><a class="btn btn-success question_id" data-id="<?php echo e($key['question_id']); ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""><i class="fas fa-vials"></i></a></td>
                    <td>
                        <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Bạn muốn xóa câu hỏi này ?')" href="xoa-cau-hoi?question_id=<?php echo e($key['question_id']); ?>&lesson_id=<?php echo e($key['lesson_id']); ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Test câu hỏi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="margin-top: 30px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.question_id').click(function(e) {
            e.preventDefault();
            var question_id = $(this).data('id');
            $.get("test-cau-hoi", {
                question_id: question_id
            }, function($data) {
                $('.modal-body').html($data);
            });
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/question/listQuestion.blade.php ENDPATH**/ ?>