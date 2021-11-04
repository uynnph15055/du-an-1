
<?php $__env->startSection('title', 'Danh sách khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <!-- Button trigger modal -->
    <h3 class="text-center">Danh sách khóa học</h3>
    <div class="row">
        <div class="col-4">
            <h4>Thêm khóa học</h4>
            <form method="POST" action="addCourse">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên khóa học</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="course_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="convert_slug" name="course_slug" placeholder="Slug khóa học" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col-8" style="margin-top:70px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Khóa học</th>
                        <th>Slug</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    <?php $__currentLoopData = $dataCourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td><?php echo e($key['course_name']); ?></td>
                        <td><?php echo e($key['course_slug']); ?></td>
                        <td><a class="btn btn-warning" href="">Sửa</a></td>
                        <td><a class="btn btn-danger" href="">Xóa</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- dd($data['dataCateProduct']); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/adminCourse/listCourse.blade.php ENDPATH**/ ?>