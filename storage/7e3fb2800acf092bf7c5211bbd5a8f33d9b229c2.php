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
        <h3 class="text-center" style="margin-bottom:40px">Sửa sản phẩm</h3>
        <form method="POST" action="./save-edit-product?id=<?php echo e($model->id); ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" placeholder="Thêm sản phẩm" name="product_name" value="<?php echo e($model->product_name); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" name="product_img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Giới Thiệu</label>
                        <input type="text" value="<?php echo e($model->product_description); ?>" placeholder="Giới thiếu sản phẩm" name="product_description" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giá</label>
                        <input type="number" placeholder="Giá sản phẩm" name="product_price" class="form-control" value="<?php echo e($model->product_price); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input type="number" placeholder="Số lượng" name="product_quantity" value="<?php echo e($model->product_quantity); ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Danh mục</label>
                        <select class="form-select" name="cate_id" aria-label="Default select example">
                            <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($key->id == $model->cate_id): ?> selected <?php endif; ?>
                                value="<?= $key->id ?>"><?php echo e($key->cate_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <textarea name="product_intro" placeholder="Mô tả sản phẩm" id="" cols="148" rows="5"><?php echo e($model->product_intro); ?></textarea>
                </div>
            </div>
            <button class="btn btn-success">Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html><?php /**PATH D:\Xampp\htdocs\PHP_2\app\views/admin/pages/adminProduct/editProduct.blade.php ENDPATH**/ ?>