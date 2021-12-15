<div class="N-box" id="myDiv">
    <div id="overflow">

        <div class="resume ">
            <button class="btn-danger2 btn btn-info  hide-btn">X</button>
            <div id="show-cv" class="d-flex"></div>
        </div>

    </div>

</div>
<div class="row align-items-center">
    <div class="col-lg-8">
        <h2 class="font-weight-700 mb-0">Danh sách hồ sơ ứng tuyển</h2>

    </div>
    <div class="col-lg-4">
        <div class="input-group mb-3">
            <div class="input-group col-8">
                <input type="text" class="form-control" placeholder="Tìm kiếm..">
                <div class="input-group-append">
                    <button class="input-group-text">
                        <a href=""><i class="far fa-search"></i></a>
                    </button>
                </div>
            </div>
            <button class="input-group-text" type="button" data-toggle="dropdown">
                Sắp xếp <i class="far fa-angle-down"></i></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=dshs">Chưa duyệt</a>
                <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=daduyet">Đã duyệt</a>
                <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=doanh_nghiep&act=tuchoi_">Từ chối</a>
            </div>
        </div>
    </div>
</div>

<div class=" h-big-box mt-4">
    <div class="h-box1">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col">MSSV</th>
                    <th scope="col">Họ &amp; tên</th>
                    <th scope="col">Ngày nộp</th>
                    <th scope="col">Vị trí ứng tuyển</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="text-center">Hồ sơ</th>
                </tr>
            </thead>
            <tbody class="table-bordered">
                <?php $i = 1;
                foreach ($ds as $row) { ?>
                    <?php $dt = getAllDangtuyen();
                    foreach ($dt as $t) { ?>
                        <?php $tieude = $t['tieu_de']; ?>
                        <?php if ($t['id_dn'] == $row['id_dn']) { ?>
                            <?php $id_dt = $t['id_dt']; ?>
                            <?php $ut = getAllUngtuyen_($id_dt,$trang_thai); ?>
                            <?php foreach ($ut as $t) { ?>
                                <?php $sv = getAllSinhvien(); ?>
                                <?php foreach ($sv as $s) { ?>

                                    <?php if ($s['id_sv'] == $t['id_sv']) { ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++ ?></th>
                                            <td><?= $s['mssv'] ?></td>
                                            <td><?= $s['ho_ten'] ?></td>
                                            <td><?= $t['ngay_dk'] ?></td>
                                            <td>Thực tập sinh</td>
                                            <td class="font-weight-bold"><?php if ($t['trang_thai'] == 0) echo '<span class="text-warning">Đang chờ ...</span>';
                                                                            elseif ($t['trang_thai'] == 1) echo '<span class="text-success"><i class="fas fa-check-circle    "></i> Chờ xác nhận</span>';
                                                                            elseif ($t['trang_thai'] == 2) echo '<span class="text-danger"><i class="fas fa-window-close    "></i> Từ chối</span>';
                                                                            elseif ($t['trang_thai'] == 3) echo '<span class="text-gray">Đã xác nhận</span>';
                                                                            ?></td>
                                            <td class="text-center"><a onclick="truyen_id(<?= $t['id_phieu'] ?>)"><i class="fas fa-address-card show-btn" style="font-size: 30px; color: #2574A9;"></i></a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function truyen_id(id_phieu) {
        $.ajax({
            type: "post",
            url: "index.php?ctrl=doanh_nghiep&act=show_cv",
            data: {
                id_phieu
            },

            success: function(response) {
                document.getElementById('show-cv').innerHTML = response
            }
        });


    }
</script>