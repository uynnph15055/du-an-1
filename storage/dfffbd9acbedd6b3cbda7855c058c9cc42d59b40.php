
<?php $__env->startSection('title', 'Danh sách người quản trị'); ?>
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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
        Thêm nhân viên
    </button>

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div style="text-align: center;" class="modal-header">
                    <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="them-admin" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Họ Tên</label>
                                <input placeholder="Thêm nhân viên" type="text" name="name" class="form-control" id="exampleInputl1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                                <br>
                                <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="img">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Chọn giới tính</label>
                                <select class="form-select" style="color:#888" name="gender" aria-label="Default select example">
                                    <option selected>Chọn giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input placeholder="Email nhân viên" type="text" required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                <input placeholder="Email nhân viên" type="text" required name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="number" placeholder="Số điện thoại" name="phone" class="form-control" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" placeholder="Nhập password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm admin</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <h4 class="text-center">Danh sách admin</h4>
    <div class="header__list">
    </div>
    <span style="float:right;font-style:italic"></span>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = $stt;
            $count = '';
            ?>
            <?php $__currentLoopData = $dataAdministrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <?php $count = $key['id'] . "button" ?>
                <td><?= $index++ ?></td>

                <td><?php echo e($key['name']); ?></td>
                <td>
                    <img width="70px" src="./public/img/<?php echo e($key['img']); ?>" alt="">
                </td>
                <td>
                    <?php if($key['gender'] == 0): ?>
                    <span>Nam</span>
                    <?php else: ?>
                    <span>Nữ</span>
                    <?php endif; ?>
                </td>
                <!-- <td><?php echo e($key['cate_name']); ?></td> -->
                <td><?php echo e($key['address']); ?></td>
                <td><?php echo e($key['email']); ?>

                </td>
                <td><?php echo e($key['phone']); ?></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không')" href="xoa-admin?id=<?php echo e($key['id']); ?>"><i class="fas fa-trash"></i></a></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i = 1 ; $i <=$page ; $i++): ?> <li class="page-item"><a class="page-link" href="?trang=<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>


</div>
<script>
    function banner_imgg() {
        var banner_img = document.getElementById('banner_img').files;

        if (banner_img.length > 0) {
            var filetoload = banner_img[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newimg = document.createElement('img');
                newimg.src = srcData;
                document.getElementById('img_main').src = newimg.src;
            }
            fileReader.readAsDataURL(filetoload);
        }
    }
</script>
<script>
    <?php foreach ($dataAdministrators as $key) {
        $idbutton = $key['id'] . "button"
    ?>
        document.getElementById("<?= $idbutton ?>").addEventListener("click", function() {
            document.getElementById('<?= $idbutton . 'hihi' ?>').style.display = "flex"

        })
        document.getElementById('<?= $idbutton . "close" ?>').addEventListener("click", function() {
            document.getElementById('<?= $idbutton . 'hihi' ?>').style.display = "none"

        })
    <?php } ?>
</script>
<script>
    $(function() {

        <?php if (isset($_SESSION['error'])) { ?>
            Swal.fire({
                icon: 'warning',
                title: '<?= $_SESSION['error']; ?>',
                timer: 3000,

            })

        <?php
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success'])) { ?>
            Swal.fire({

                icon: 'success',
                title: '<?= $_SESSION['success']; ?>',
                showConfirmButton: false,
                timer: 1500

            })

        <?php unset($_SESSION['success']);
        }
        ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/administrators/listAdministrators.blade.php ENDPATH**/ ?>