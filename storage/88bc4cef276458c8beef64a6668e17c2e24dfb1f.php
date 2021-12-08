
<?php $__env->startSection('title', 'Danh sách khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 class="text-center">Danh sách danh mục</h4>
    <?php if(isset($editCate)): ?>
    <div class="row" style="margin-top:30px">
        <div class="col-4">
            <h5>Sửa danh mục khóa học</h5>
            <form method="POST" action="update-danh-muc">
                <?php $__currentLoopData = $modelCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="cate_id" value="<?php echo e($value['cate_id']); ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" value="<?php echo e($value['cate_name']); ?>" onkeyup="ChangeToSlug()" placeholder="Tên khóa học" name="cate_name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="<?php echo e($value['cate_slug']); ?>" id="convert_slug" name="cate_slug" placeholder="Slug danh mục">
                </div>

                <button type="submit" id="submit" class="btn btn-primary">Update</button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </form>
        </div>
        <?php else: ?>
        <div class="row" style="margin-top:30px">
            <div class="col-4">
                <h5>Thêm danh mục khóa học</h5>
                <form method="POST" action="them-danh-muc">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên danh mục" name="cate_name" id="slug" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="convert_slug" name="cate_slug" placeholder="Slug danh mục">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <?php endif; ?>
            <div class="col-8">
                <span style="float:right;font-style:italic">Tổng có : <?php echo count($dataCate) ?> danh mục</span>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Ngày đăng </th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        ?>
                        <?php $__currentLoopData = $dataCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?= $index++ ?></td>
                            <td><?php echo e($key['cate_name']); ?></td>
                            <td><?php echo e($key['date_create']); ?></td>
                            <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa khóa học này ?')" href="sua-danh-muc?id=<?php echo e($key['cate_id']); ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa khóa học này ?')" href="xoa-danh-muc?id=<?php echo e($key['cate_id']); ?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/cateSubject/listCateSubject.blade.php ENDPATH**/ ?>