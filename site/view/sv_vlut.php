<?php
$dt = getViecLamUngTuyen();
if (isset($dt) && $dt != '') {
    $ttsv =  checksinhvienbyid($dt['id_sv']);
    $ttn = checknganhbyid($ttsv['id_nganh']);
    $ttdn = checkdoanhnghiepbyid($dt['id_dn']);
    if ($ttsv['trang_thai'] == 1) {
        $trang_thai = 'Đang Thực tập';
    } else {
        $trang_thai = 'Đã Thực tập xong';
    }
    if ($dt['ket_qua'] == 0) $kq = 'Chưa có';
    elseif ($dt['ket_qua'] == 1) $kq = 'Rớt';
    else $kq = 'Đạt';
?>
    <div class="h-big-box-vlut shadow p-3 rounded">
        <h2 class="text-uppercase">Việc làm ứng tuyển</h2>
        <div class="h-box-vlut-con mt-3 p-0">
            <div class="h-vlut-con-left">
                <!-- BOX SHADOW Cũ <div class="h-vlut-con-right shadow-sm rounded-lg p-3"></div> -->
                <div class="h-vlut-tieude">
                    <div class="row">
                        <div class="col-lg-4 fw-500"> <i class="far fa-user-graduate"></i> Sinh viên: </div>
                        <div class="col-lg-5"> <label for="" class="mb-3 fw-500"><?= $ttsv['ho_ten'] ?></label> </div>
                        <div class="col-lg-3 text-right"> Mã SV: <label for="" class="mb-2 "> <?= $ttsv['mssv'] ?></label> </div>

                        <div class="col-lg-4 fw-500"> <i class="far fa-code"></i> Chuyên ngành:</div>
                        <div class="col-lg-8"> <label for="" class="mb-3"><?= $ttn['ten_nganh'] ?></label></div>

                        <div class="col-lg-4 fw-500"> <i class="far fa-building"></i> Thực tập tại:</div>
                        <div class="col-lg-8"> <label for="" class="mb-3">
                                <a href="" class="text-info"> <?= $ttdn['ten_dn'] ?></a></label>
                        </div>

                        <div class="col-lg-4 fw-500"> <i class="far fa-map-marker-alt"></i> Địa chỉ:</div>
                        <div class="col-lg-8"> <label for="" class="mb-3"><?= $ttdn['dia_chi'] ?></label> </div>

                        <div class="col-lg-4 fw-500"> <i class="far fa-info-circle"></i> Trạng thái: </div>
                        <div class="col-lg-8"> <label for="" class="mb-2 text-success"> <?= $trang_thai ?></label></div>
                    </div>

                    <hr class="h-vlut-hr w-50">
                    <?php if ($dt['ket_qua'] != 0) { ?>
                        <div class="h-vlut-nx text-secondary mt-4">
                            <p class="text-white text-uppercase text-center fw-500 bg-cam w-100 bodo py-2"> Đánh giá từ doanh nghiệp </p>
                            <div class="h-vlut-nx-con">
                                <p class="text-dark h6"><i class="far fa-user"></i> Đánh giá:
                                    <?php if ($dt['ket_qua'] == 1) { ?> <span class="text-danger"> <?= $kq ?> </span>
                                    <?php } else { ?>
                                        <span class="text-success"> <?= $kq ?> <i class="far fa-check"></i></span>
                                    <?php } ?>
                                </p>
                                <span class="text-dark h6 mt-3"><i class="far fa-comment-lines"></i> Nhận xét: </span>
                                <span class="text-secondary mt-1">
                                    <span class="h-nx-text"> <?= $dt['danh_gia'] ?></span>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="h-vlut-con-right border-left px-2">
                <div class="h-border-time rounded">
                    <span class="text-dark fw-500">Thời gian thực tập</span>
                    <div class="row mt-1">
                        <div class="col-6 text-secondary"><i class="far fa-hourglass-start"></i> Bắt đầu:</div>
                        <label class="col-6 text-right text-info"><?php $tg = $dt['thoi_gian_duyet'];
                                                                    $tg = strtotime($tg);
                                                                    echo date("d/m/Y", $tg); ?></label>
                        <div class="col-6 text-secondary"><i class="far fa-hourglass-end"></i> Kết thúc:</div>
                        <?php if (isset($dt['tg_kt'])) { ?>
                            <label class="col-6 text-right text-info"><?php echo date('d/m/yy', strtotime($dt['tg_kt'])); ?></label>

                        <?php } else { ?>
                            <div class="h-vlut-loader"></div><?php } ?>
                        <!-- <label class="col-6 text-right text-info">12/11/2021</label>  -->
                        <!-- Nếu trạng thái = 2 (Đã thực tập xong) thì hiển thị ngày kết thúc -->
                    </div>
                    <hr>
                    <div class="row px-0 mt-2 mb-2">
                        <div class="col-6 fw-500 text-dark"><i class="far fa-user-graduate"></i> Kết quả: </div>


                        <?php if ($dt['ket_qua'] == 2) { ?><label class="col-6 text-center text-success fw-500"><?= $kq ?></label>
                        <?php } else { ?>

                            <span class="col-6 text-right text-danger fw-500"> <?= $kq ?> </span>
                        <?php } ?>
                    </div>
                </div>

                <div class="h-con-right-hinh mt-5">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <h2 style="text-align: center;color:brown">Chưa có nơi nào thực tập</h2>
<?php } ?>