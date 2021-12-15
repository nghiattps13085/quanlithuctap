<div class="row m-2">
    <div class="alert alert-primary w-100  mt-4 " role="alert">
        <h1><?= $row['tieu_de'] ?></h1>
        <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
                </ol>
            </nav> -->
    </div>
</div>
<div class="row m-2">
    <div class="col-4 ">
        <div class="col-12 shadow-lg py-4 rounded">
            <img src="https://p-10.nl/wp-content/uploads/2017/12/vnglogo-1024x576.jpg" class="img-fluid" alt="Responsive image">
            <div class="row py-1 ">
                <div class="col-12 ">
                    <?php
                    $dn = getAllDoanhnghiep();
                    foreach ($dn as $r) { ?>
                        <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                            Doanh nghiệp :<b> <?= $r['ten_dn'] ?></b>
                </div>
            <?php } ?>
        <?php } ?>
            </div>
            <div class="row py-1">
                <div class="col-12">
                    <i class="fa fa-envelope"></i> Email:<b> Nghiadeptrai@gmail.com</b>
                </div>
            </div>
            <div class="row py-1">
                <div class="col-12">
                    <i class="fa fa-phone"></i> Sđt:<b> 0944810751</b>
                </div>
            </div>
            <div class="row py-1">
                <div class="col-12">
                    Trạng thái: <b class="text-success">Đang tuyển</b>
                </div>
            </div>
            <div class="row mx-3 mb-1 mt-5">
                <div class="col-8 px-1">
                    <button class="btn btn-success float-right ml-2 py-2"><a class="text-light text-decoration-none" href="<?= SITE_URL ?>/?ctrl=dang_tuyen&act=ung_tuyen&id_dt=<?= $row['id_dt'] ?>"> Chi tiết sinh
                            viên ứng tuyển</a></button>
                </div>
                <div class="col-4 px-1">
                    <button class="btn btn-danger float-right py-2"> <a class="text-light text-decoration-none" href="?ctrl=dang_tuyen&act=delete&id_dt=<?= $row['id_dt'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xoá đăng tuyển</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7  shadow-lg ml-4 py-4  rounded">
        <table>
            <tbody>
                <tr>
                    <td> Ngành tuyển</td>
                    <td class="px-5">
                        <?php
                        $ds = getAllNganh();
                        foreach ($ds as $r) { ?>
                            <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                                <input type=" text" class="form-control" readonly="readonly" value=" <?= $r['ten_nganh'] ?>">
                            <?php } ?>
                        <?php } ?>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td>Mức lương</td>
                    <td class="px-5">
                        <input type=" text" class="form-control" readonly="readonly" value=" <?= $row['luong'] ?> VND">
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td>Thời gian thực tập</td>
                    <td class="px-5">
                        <input type=" text" class="form-control" readonly="readonly" value="3 Tháng">
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td> Số lượng thực tập sinh cần tuyển</td>
                    <td class="px-5">
                        <input type=" text" class="form-control" readonly="readonly" value=" <?= $row['sl_sv_can'] ?>">
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td> Hình thức</td>
                    <td class="px-5">
                        <div class="form-check-inline w-100">
                            <input type=" text" class="form-control" readonly="readonly" value="Thực tập sinh">
                            <input type=" text" class="form-control  ml-3" readonly="readonly" value="Fulltime">
                        </div>
                    </td>
                </tr>
                <tr style="height:20px;"></tr>
            </tbody>
        </table>
        <div class="row mx-1 mt-4">
            Phúc lợi
        </div>
        <div class="row  mx-1 mt-2">
            <div class="col-6">
                <div class="custom-control custom-checkbox  mb-2">
                    <input type="checkbox" class="custom-control-input" onclick="return false;" id="defaultInline3" checked>
                    <label class="custom-control-label" for="defaultInline3"> <i class="fas fa-award"></i> Chế độ
                        thưởng</label>
                </div>
                <div class="custom-control custom-checkbox  mb-2">
                    <input type="checkbox" class="custom-control-input" onclick="return false;" id="defaultInline4">
                    <label class="custom-control-label" for="defaultInline4"><i class="	fas fa-atom "></i> Chương trình
                        đào tạo</label>
                </div>
                <div class="custom-control custom-checkbox  mb-2">
                    <input type="checkbox" class="custom-control-input" onclick="return false;" id="defaultInline5" checked>
                    <label class="custom-control-label" for="defaultInline5"><i class="fa fa-level-up"></i> Tăng
                        lương</label>
                </div>

            </div>
            <div class="col-6">
                <div class="custom-control custom-checkbox  mb-2">
                    <input type="checkbox" class="custom-control-input" onclick="return false;" id="defaultInline6" checked>
                    <label class="custom-control-label" for="defaultInline6"><i class="fa fa-laptop"></i> Laptop</label>
                </div>
                <div class="custom-control custom-checkbox  mb-2">
                    <input type="checkbox" class="custom-control-input" onclick="return false;" id="defaultInline2">
                    <label class="custom-control-label" for="defaultInline2"><i class="fas fa-suitcase"></i> Du
                        lịch</label>
                </div>
            </div>
        </div>
        <div class="row mx-1 mt-4">
            Mô tả công việc
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-12">
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" readonly rows="4"> <?= $row['mo_ta'] ?></textarea>
                </div>
            </div>

        </div>
        <div class="row mx-1 mt-4">
            Yêu cầu công việc
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-12">
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" readonly rows="4" value=""> <?= $row['yeu_cau'] ?></textarea>
                </div>
            </div>

        </div>
        <div class="row mx-1 mt-4">
            thông tin khác
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-12">
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" readonly rows="3"></textarea>
                </div>
            </div>

        </div>
        <!-- <?php
                $ds = getAllDoanhnghiep();
                foreach ($ds as $r) { ?>
        <?php if ($row['id_dn'] == $r['id_dn']) { ?>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Tên doanh nghiệp </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $r['ten_dn'] ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php require_once "models/nganh.php";
        $ds = getAllNganh();
        foreach ($ds as $r) { ?>
        <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Ngành tuyển </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $r['ten_nganh'] ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Yêu cầu </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $row['yeu_cau'] ?>
            </div>
        </div>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Lương </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $row['luong'] ?>$
            </div>
        </div>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Số lượng cần </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $row['sl_sv_can'] ?>
            </div>
        </div>
        <div class="row  mx-1 mb-1">
            <div class="col-4 bg-primary text-white py-3 rounded-left">
                <b> Số lượng SV đăng kí </b>
            </div>
            <div class="col-6  py-3 border-top border-right border-bottom rounded-right">
                <?= $row['sl_sv_dk'] ?>
            </div>
        </div> -->

        <!-- 
        <ul class="list-group">
            <li class="list-group-item"><?php
                                        $ds = getAllDoanhnghiep();
                                        foreach ($ds as $r) { ?>
                <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                <b>Tên doanh nghiệp:</b> <?= $r['ten_dn'] ?><br>
                <?php } ?>
                <?php } ?>
            </li>
            <li class="list-group-item"> <?php require_once "models/nganh.php";
                                            $ds = getAllNganh();
                                            foreach ($ds as $r) { ?>
                <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                <b>Ngành tuyển:</b> <?= $r['ten_nganh'] ?><br>
                <?php } ?>
                <?php } ?>
            </li>
            <li class="list-group-item"><b>Yêu cầu:</b> <?= $row['yeu_cau'] ?><br>
            <li class="list-group-item"><b>Lương:</b> <?= $row['luong'] ?>$<br>
            <li class="list-group-item"> <b>Số lượng cần:</b> <?= $row['sl_sv_can'] ?><br></li>
            <li class="list-group-item"> <b>Số lượng sinh viên đăng ký:</b> <?= $row['sl_sv_dk'] ?><br></li>
            <li class="list-group-item"><button class="btn btn-success"><a class="text-light"
                        href="<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=ung_tuyen&id_dt=<?= $row['id_dt'] ?>"> Chi tiết sinh
                        viên ứng tuyển</a></button>
                <button class="btn btn-danger"> <a class="text-light"
                        href="?ctrl=dang_tuyen&act=delete&id_dt=<?= $row['id_dt'] ?>"
                        onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xoá đăng tuyển</a></button>
            </li>
        </ul> -->
    </div>
</div>
