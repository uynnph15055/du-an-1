
<?php $__env->startSection('title', 'Thông tin nhân viên'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="content">
    <h3 class="text-center" style="margin-bottom: 30px;">Thông tin nhân viên</h3>
    <div class="container-fluid">
        <div class="container">
            <div class="profile_admin">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img style="width:204px;border-radius:50%" src="./public/img/<?php echo e($admin['img']); ?>" alt="Maxwell Admin">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="user-name" style="color:brown"><?php echo e($admin['name']); ?></h5>
                                        <p><?php echo e($admin['email']); ?></p>
                                        <h5><?php echo e($admin['phone']); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form action="">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">Personal Details</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fullName" value="<?php echo e($admin['name']); ?>" placeholder="Enter full name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="eMail">Email</label>
                                                <input type="email" value="<?php echo e($admin['email']); ?>" class="form-control" id="eMail" placeholder="Enter email ID">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" value="<?php echo e($admin['phone']); ?>" class="form-control" id="phone" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="website">Image</label>
                                                <input type="file" class="form-control" id="website">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="website">Gender</label>
                                                <select class="form-control" name="" id="">
                                                    <option name="gioi_tinh" value="1">Nam</option>
                                                    <option name="gioi_tinh" value="2">Nữ</option>
                                                    <option name="gioi_tinh" value="3">Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="Street">Address</label>
                                                <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="submit" id="submit" name="submit" class="btn btn-success">Cập nhật thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\KI III\xam\htdocs\project_one\app\views/admin/inforAdmin/profile_admin.blade.php ENDPATH**/ ?>