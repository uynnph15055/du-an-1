<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3 class="text-center" style="margin-bottom:30px">Quản lý sản phẩm</h3>
        <a href="" class="btn btn-success">Thêm sản phẩm</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Dạnh mục</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                ?>
                <?php $__currentLoopData = $dataProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?php echo e($key->product_name); ?></td>
                    <td>
                        <img src="<?= $key->product_img ?>" alt="">
                    </td>
                    <td> <?php echo e($key->product_price); ?></td>
                    <td> <?php echo e($key->product_quantity); ?></td>
                    <td><?php echo e($key->cate_id); ?></td>
                    <td><a class="btn btn-warning" href="">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Ban có muốn xóa dòng dữ liệu này ?')" href="">Remove</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html><?php /**PATH D:\Xampp\htdocs\PHP_2\app\views/admin/pages/adminProduct.blade.php ENDPATH**/ ?>