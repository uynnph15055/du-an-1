
<?php $__env->startSection('title', 'Danh sách menu'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 class="text-center">Danh sách menu</h4>
    <div class="row">
        <?php if(isset($row)): ?>
        <h5>Sửa menu</h5>
        <div class="col-4">
            <form action="sua-menu" method="POST">
                <input type="text" hidden value="<?php echo e($row['menu_id']); ?>" name="menu_id">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên menu</label>
                    <input type="text" class="form-control" placeholder="Tên menu" value="<?php echo e($row['menu_name']); ?>" name="menu_name" id="slug" onkeyup="ChangeToSlug()" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug menu</label>
                    <input type="text" placeholder="Slug menu" id="convert_slug" value="<?php echo e($row['menu_slug']); ?>" name="menu_slug" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php else: ?>
        <h5>Thêm menu</h5>
        <div class="col-4">
            <form action="them-menu" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên menu</label>
                    <input type="text" class="form-control" placeholder="Tên menu" name="menu_name" id="slug" onkeyup="ChangeToSlug()" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug menu</label>
                    <input type="text" placeholder="Slug menu" id="convert_slug" name="menu_slug" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php endif; ?>
        <div class="col-8">
            <table class="table table-bordered" style="margin-top:30px">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên menu</th>
                        <th>Slug menu</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    ?>
                    <?php $__currentLoopData = $dataMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td><?php echo e($key['menu_name']); ?></td>
                        <td><?php echo e($key['menu_slug']); ?></td>
                        <td><a class="btn btn-warning" href="trang-sua-menu?id=<?php echo e($key['menu_id']); ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này ?')" href="xoa-menu?id=<?php echo e($key['menu_id']); ?>"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminMenu/listMenu.blade.php ENDPATH**/ ?>