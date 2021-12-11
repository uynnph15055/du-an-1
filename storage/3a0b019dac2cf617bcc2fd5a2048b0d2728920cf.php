
<?php $__env->startSection('title', 'Trang chính'); ?>
<?php $__env->startSection('main_content'); ?>
<style>
    .count {
        color: #000;
        margin-top: 10px;
    }

    .icon-count {
        color: #ccc;
        font-size: 30px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Học viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="align-items: center;">
                    <a class="small  stretched-link" href="danh-sach-hoc-vien">View học viên</a>
                    <h3 class="count"><?php echo e($student); ?></h3>
                    <i class="fas fa-address-card icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Hóa đơn</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="thong-tin-hoa-don">View hóa đơn</a>
                    <h3 class="count"><?php echo e($bill); ?></h3>
                    <i class="fas fa-receipt icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Nhân viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="danh-sach-admin">View nhân viên</a>
                    <h3 class="count"><?php echo e($admin); ?></h3>
                    <i class="fas fa-users-cog icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Khóa học</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="danh-sach-mon?trang=1">View khóa học</a>
                    <h3 class="count"><?php echo e($subject); ?></h3>
                    <i class="fas fa-brush icon-count"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="piechart" style="width: 1050px; height: 500px;background-color: #ccc;"></div>
    <div class="table-bill">
        <br>
        <div class="" style="display: flex;justify-content: space-between;">
            <h4>Danh thu năm : 2021</h4>
            <select class="form-select" style="width:200px;" id="filter-time" aria-label="Default select example">
                <option selected>Lọc theo thời gian</option>
                <option value="1">7 ngày</option>
                <option value="2">1 tháng</option>
                <option value="3">3 tháng</option>
            </select>
        </div>
        <table class="table table-bordered" style="margin-top:30px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày mua</th>
                    <th>Môn</th>
                    <th>Số tiền</th>
                    <th width="120px">Xem chi tiết</th>
                </tr>
            </thead>
            <tbody id="body">
                <?php
                $total = 0;
                $index = 1;
                ?>
                <?php $__currentLoopData = $dataBill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $key['monney']; ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?php echo e($key['transfer_time']); ?></td>
                    <td><?php echo e($key['subject_name']); ?></td>
                    <td><?php echo e($key['monney']); ?></td>
                    <td><a href="chi-tiet-hoa-don-admin?subject_id=<?php echo e($key['subject_id']); ?>" class="btn btn-success">Chi tiết</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h4 id="sumMoney">Tổng tiền : <?= number_format($total) ?>VNĐ</h4>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['cate_name', 'number_cate'],
            <?php foreach ($data as $key) {
                echo "['" . $key['cate_name'] . "', " . $key['number_cate'] . "],";
            }  ?>
        ]);

        var options = {
            title: 'Khóa theo danh mục'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('#filter-time').on('change', function() {
            var filter_id = $(this).val();
            $.get("doanh-thu-select", {
                filter_id: filter_id
            }, function($data, $h) {
                $('#body').html($data);
                $('#sumMoney').html($h);
            })
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baseAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/admin/adminMain/main.blade.php ENDPATH**/ ?>