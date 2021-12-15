<!-- <div class="row px-5 mt-5">
    <div class="col-12 ">
        <div class="row d-flex justify-content-between nowrap">
            <div class="col-3 px-1 text-center ">
                <div class="  rounded-pill N-gradient text-white">
2

                </div>
                <label for="">Tổng số doanh nghiệp</label>
            </div>
            <div class="col-3  px-1 text-center">
                <div class="  rounded-pill  N-gradient">2</div>
            </div>
            <div class="col-3  px-1 text-center  ">
                <div class="  rounded-pill  N-gradient">2</div>
            </div>
            <div class="col-3  px-1 text-center">
                <div class="  rounded-pill  N-gradient">2</div>
            </div>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-12 alert alert-primary">
        <h2 class="my-3">DashBoard</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Tổng số doanh nghiệp
                <h3 class="my-2"><?= demDoanhnghiep() ?></h3>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card  bg-warning text-white mb-4">
            <div class="card-body">Tổng số bài đăng tuyển
                <h3 class="my-2"><?= demDangtuyen() ?></h3>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= ADMIN_URL ?>/?ctrl=dang_tuyen">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card  bg-success text-white mb-4">
            <div class="card-body">Tổng số sinh viên
                <h3 class="my-2"><?= demSinhvien() ?></h3>

            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Sinh viên đang thực tập
                <h3 class="my-2"><?= demSinhvienTT() ?></h3>

            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=dacott">View
                    Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5" >
    <div class="col-12">
        <h3 class="text-center"></h3>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Số lượng sinh viên thực tập
            </div>
            <div class="card-body" style="height:300px;" >
                <canvas id="myChart" style="max-height:100% ;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                Số lượng sinh viên thực tập
            </div>
            <div class="card-body "  style="height:300px">
                <div id="columnchart_values" style="height:100%" ></div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card-deck my-1">
    <div class="card text-white bg-primary">
        <a href="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep">
            <img src="views/images/doanhnghiep.jpg" class="card-img-top" alt="" width="150" height="200"></a>
        <div class="card-body ">
            <h5 class="card-title">Tổng số doanh nghiệp</h5>
            <p class="card-text"><?= demDoanhnghiep() ?></p>
        </div>
    </div>
    <div class="card text-white bg-success">
        <a href="<?= ADMIN_URL ?>/?ctrl=dang_tuyen">
            <img src="views/images/job.jpg" class="card-img-top" width="150" height="200"></a>
        <div class="card-body">
            <h5 class="card-title">Tổng số bài đăng tuyển</h5>
            <p class="card-text"><?= demDangtuyen() ?></p>
        </div>
    </div>
    <div class="card text-white bg-info">
        <a href="<?= ADMIN_URL ?>/?ctrl=sinh_vien">
            <img src="views/images/sinhvien.jpg" class="card-img-top" alt="..." width="150" height="200"></a>
        <div class="card-body">
            <h5 class="card-title">Tổng số sinh viên</h5>
            <p class="card-text"><?= demSinhvien() ?></p>
        </div>
    </div>
    <div class="card text-white bg-warning">
        <a href="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=dacott">
            <img src="views/images/sinhvien2.jpg" class="card-img-top" alt="..." width="150" height="200"></a>
        <div class="card-body">
            <h5 class="card-title">Sinh viên đang thực tập</h5>
            <p class="card-text"><?= demSinhvienTT() ?></p>
        </div>
    </div>
</div> -->
<?php require_once "models/home.php"; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {
    packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", {
            role: "style"
        }],
        ["Doanh thời trang Thái Tuấn", <?=demDangtuyentheoDN($id_dn=13)?>, "#1abc9c"],
        ["Doanh nghiệp thành công", <?=demDangtuyentheoDN($id_dn=15)?>, "#f1c40f"],
        ["Doanh nghiệp đào tạo", <?=demDangtuyentheoDN($id_dn=17)?>, "#3498db"],
        ["Doanh nghiệp Vinalink", <?=demDangtuyentheoDN($id_dn=14)?>, "#e67e22"]
    ]);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation"
        },
        2
    ]);
    var options = {
        bar: {
            groupWidth: "50%"
        },
        legend: {
            position: "none"
        },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}


google.charts.load('current', {
    packages: ['corechart']
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>


<!-- <div class="row">
    <div id="columnchart_values" style="height: 400px;" class="col-10"></div>
</div> -->