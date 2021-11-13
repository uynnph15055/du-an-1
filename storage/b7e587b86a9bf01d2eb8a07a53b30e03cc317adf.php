
<?php $__env->startSection('title', 'Danh sách câu hỏi'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 class="text-center">Danh sách câu hỏi</h4>
    <a href="de-mo-bai-tap">demo</a>
    <?php if($lesson_id): ?>
    <a class="btn btn-primary" href="trang-them-cau-hoi?lesson_id=<?php echo e($lesson_id); ?>">Thêm câu hỏi</a>
    <?php endif; ?>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Đề bài</th>
                <th>Ảnh</th>

                <th>Đáp án</th>
                <th>Sửa</th>
                <th>Xóa</th>
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
                    <td><?php echo e($key['question']); ?></td>
                    <td><img style="height: 60px; width:50px" src="./public/img/<?php echo e($key['question_img']); ?>" alt=""></td>
                    <td>
                        <?php foreach ($a as $value) {
                 
                            ?>
                            - <?= $value ?>
                            <br> <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/question/listQuestion.blade.php ENDPATH**/ ?>