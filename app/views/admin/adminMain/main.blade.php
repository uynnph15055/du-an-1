@extends('admin.layouts.baseAdmin')
@section('title', 'Trang chính')
@section('main_content')
<div class="container">
    <h3> Trang chính :</h3>
    <br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Sản phẩm</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="">View sản phẩm</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Khách hàng</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="">View khách hàng</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Bài Viết</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="">View bài viết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Nhân viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="">View nhân viên</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="piechart" style="width: 1050px; height: 500px;background-color: #ccc;"></div>
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
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endsection