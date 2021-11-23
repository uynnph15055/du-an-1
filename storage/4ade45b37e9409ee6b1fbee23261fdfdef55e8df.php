
<?php $__env->startSection('title', 'Danh sách menu'); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <h4 class="text-center">Danh sách menu</h4>
    <p class="text-center" style="font-style: italic;">Lưu ý chỉ tối đa 4 menu</p>
    <div class="row">
        <?php if(isset($row)): ?>
        <div class="col-4">
            <h5 class="text-center">Sửa menu</h5>
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
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Thứ tự</label>
                    <input type="number" min="1" max="5" placeholder="Thứ tự" value="<?php echo e($row['menu_index']); ?>" name="index" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Sửa menu</button>
            </form>
        </div>
        <?php else: ?>
        <div class="col-4">
            <h5 class="text-center">Thêm menu</h5>
            <form action="them-menu" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên menu</label>
                    <input type="text" class="form-control" placeholder="Tên menu" name="menu_name" id="slug" onkeyup="ChangeToSlug()" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug menu</label>
                    <input type="text" placeholder="Slug menu" id="convert_slug" name="menu_slug" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Thứ tự</label>
                    <input type="number" placeholder="Thứ tự" min="1" max="5" name="index" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Thêm menu</button>
            </form>
        </div>
        <?php endif; ?>
        <div class="col-8">
            <span style="float:right;font-style:italic">Tổng có : <?php echo count($dataMenu) ?> menu</span>
            <form action="cap-nhat-menu" method="POST">
                <table class="table table-bordered" style="margin-top:30px">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên menu</th>
                            <th>Slug menu</th>
                            <th width="80px">Thứ tự</th>
                            <th width="80px">Sửa</th>
                            <th width="80px">Xóa</th>
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
                            <td>
                                <input name="menu_index[]" value="<?php echo e($key['menu_index']); ?>" style="width:60px" type="number">
                            </td>
                            <td><a class="btn btn-warning" href="trang-sua-menu?id=<?php echo e($key['menu_id']); ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này ?')" href="xoa-menu?id=<?php echo e($key['menu_id']); ?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project_one\app\views/admin/adminMenu/listMenu.blade.php ENDPATH**/ ?>