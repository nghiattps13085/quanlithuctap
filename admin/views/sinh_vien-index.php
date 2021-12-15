<?php
if (isset($_POST['bttn'])) {
    $file = $_FILES['file']['tmp_name'];
    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objReader->setLoadSheetsOnly('Sheet1');
    $objExcel = $objReader->load($file);
    $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
    $highRow = $objExcel->setActiveSheetIndex()->getHighestRow();
    for ($row = 2; $row <= $highRow; $row++) {
        $user = $sheetData[$row]['A'];
        $pass = $sheetData[$row]['B'];
        $ho_ten = $sheetData[$row]['C'];
        $mssv = $sheetData[$row]['D'];
        $id_nganh = $sheetData[$row]['E'];
        $email = $user;
        $chuc_vu = 0;
        addNewUserE($user, $pass, $email, $chuc_vu);
        $user_full = seach_id_user($user);
        $id_user = $user_full['id_user'];

        $id_nganh = tim_id_nganh($id_nganh);
        $id_nganh = $id_nganh['id_nganh'];
        addNewSinhvienforexecl($id_user, $ho_ten, $mssv, $id_nganh);
        $sv_full = seach_id_sv($id_user);
        $id_sv = $sv_full['id_sv'];
        addNewhosoforexecl($id_sv);
    }
    echo "<script type='text/javascript'>alert('đã thêm thành công');</script>";
    echo "<script type='text/javascript'>window.location='index.php?ctrl=sinh_vien';</script>";
}
if (isset($_POST['btnExport'])) {
    $fileType = 'Excel2007';
    $objPHPExcel = PHPExcel_IOFactory::load("product_import.xlsx");
    $array_data =  xuat_sv();

    // Thiết lập tên các cột dữ liệu
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', "STT")
        ->setCellValue('B1', "họ tên")
        ->setCellValue('C1', "Chuyên Ngành")
        ->setCellValue('D1', "Doanh Nghiệp")
        ->setCellValue('E1', "Kết quả");

    // Lặp qua các dòng dữ liệu trong mảng $array_data và tiến hành ghi dữ liệu vào file excel
    $i = 2;
    foreach ($array_data as $value) {
        $k = $i - 1;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", "$k")
            ->setCellValue("B$i", $value['ho_ten'])
            ->setCellValue("C$i", $value['ten_nganh'])
            ->setCellValue("D$i", $value['ten_dn'])
            ->setCellValue("E$i", $value['ket_qua']);
        $i++;
    }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
    $fileName = 'product_import.xlsx';
    $objWriter->save($fileName);
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($fileName));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($fileName);
    return;
}
?>
<div class="row">
    <div class="alert alert-primary w-100 p-3" role="alert">
        <h1>QUẢN LÝ SINH VIÊN</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
            </ol>
        </nav>
    </div>
</div>
<div class="mb-3">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success px-3" data-toggle="modal" data-target="#modelId">
        <i class="fas fa-plus    "></i> File Exel
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        <i class="fas fa-plus"></i> Thêm sinh viên
    </button>
    </br>

    <input id="xoaall" type="submit" name="xoaall" class="btn btn-danger d-inline-block mt-3" value="Xóa Mục Đã Chọn">
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header alert alert-success">
                    <h5 class="modal-title">Upload file exel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Mẫu file exel</h1>
                        <img src="../uploads/Excel.PNG" width="100%" alt="" class="mb-5">
                        <form method="POST" class=" shadow rounded mt-5" action="index.php?ctrl=sinh_vien" enctype="multipart/form-data">
                            <input type="file" name="file">
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success" name="bttn">Thêm</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=insert" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center text-primary">
                            <h1 class="mb-4">Thêm sinh viên</h1>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                            <?php if (isset($email_error)) { ?>
                                <span class="badge badge-warning"> <?= $email_error ?> </span>
                            <?php } ?>
                            <span id="kqcheckemail"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" required placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user" name="ho_ten" required placeholder="Họ tên sinh viên">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <select name="id_nganh" class="form-control" required>
                                    <option value="">Chọn ngành</option>
                                    <?php require_once "models/nganh.php";
                                    $ds = getAllNganh();
                                    foreach ($ds as $row) { ?>
                                        <option value="<?= $row['id_nganh'] ?>"> <?= $row['ten_nganh'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <input type="number" class="form-control" id="sdt" name="sdt" required placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="mssv" name="mssv" required placeholder="Mã số sinh viên">
                                <?php if (isset($user_error)) { ?>
                                    <span class="badge badge-warning"> <?= $user_error ?> </span>
                                <?php } ?>
                                <span id="kqcheckmssv"></span>
                            </div>
                            <div class="form-group col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white" id="inputGroupFileAddon01">UPLOAD</span>
                                    </div>
                                    <div class="custom-file  ">
                                        <input type="file" class="custom-file-input " id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="anh">
                                        <label class="custom-file-label " for="inputGroupFile01">ẢNH</label>
                                    </div>
                                </div>
                                <!-- <input type="file" class="form-control overflow-hidden" name="anh"> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Giới tính</label><br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gioitinh0" name="gioi_tinh" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="gioitinh0"> Nam</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gioitinh1" name="gioi_tinh" class="custom-control-input">
                                    <label class="custom-control-label" for="gioitinh1"> Nữ</label>
                                </div>
                                <!-- <label for="">Giới tính:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh1"
                                        value="1" checked>
                                    <label class="form-check-label"> Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh0"
                                        value="0">
                                    <label class="form-check-label">Nữ</label>
                                </div> -->
                            </div>
                            <div class="form-group col-6">
                                <label for="">Trạng thái</label><br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="trang_thai1" name="trang_thai" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="trang_thai1"> Đã có nơi thực tập</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="trang_thai0" name="trang_thai" class="custom-control-input" value="0" checked>
                                    <label class="custom-control-label" for="trang_thai0"> Chưa có nơi thực tập</label>
                                </div>
                                <!-- <label for="">Trạng thái</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai1"
                                        value="1">
                                    <label class="form-check-label"> Đã có nơi thực tập</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai0"
                                        value="0" checked>
                                    <label class="form-check-label">Chưa có nơi thực tập</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger px-3 mt-3" data-dismiss="modal">Huỷ</button>
                            <button type="submit" class="btn btn-primary px-3 mt-3">Lưu lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- dropdown  -->
</div>
<div class="alert alert-dark mb-0 border-bottom-0" role="alert">
    <div class="d-flex justify-content-between">
        <h3>Bảng danh sách sinh viên</h3>
        <div class="boxtimkiem d-flex">
            <form method="POST" class="" action="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=timkiem">
                <div class="input-group">
                    <input class="form-control" name="mssv" type="text" placeholder="Nhập mssv cần tìm..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <form action="exel/exel.php" method="post">

                <button type="submit" name="btnExport<?php
                                                        if (isset($_GET['act'])) {
                                                            if ($_GET['act'] == 'chuacott') {
                                                                echo '1';
                                                            } elseif ($_GET['act'] == 'dahoanthanh') {
                                                                echo '3';
                                                            } elseif ($_GET['act'] == 'dacott') {
                                                                echo '2';
                                                            }
                                                        } else echo '0';

                                                        ?>" class="btn btn-primary mx-3">
                    Xuất Thành file Exel
                </button>
            </form>
            <div class="dropdown ml-3">
                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-filter    "></i>
                    <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right bg-secondary pb-3 pt-0">
                    <div class="alert alert-light rounded-0" role="alert">
                        <strong><i class="fas fa-filter    "></i> Lọc </strong>
                    </div>
                    <li><a class="dropdown-item text-light" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien">Tất cả</a></li>
                    <li><a class="dropdown-item text-light" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=dacott">Đang
                            thực tập</a></li>
                    <li><a class="dropdown-item text-light" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=chuacott">Chưa có
                            nơi thực tập</a></li>
                    <li><a class="dropdown-item text-light" href="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=dahoanthanh">Đã hoàn thành thực tập</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover Nghia-admin-tb mt-2">
    <thead class="bg-primary">
        <tr>
            <th scope="col" rowspan="2" class="py-5"><input type="checkbox" id="checkall" class="mr-2">#</th>
            <th scope="col" colspan="4">THÔNG TIN CÁ NHÂN</th>
            <th scope="col" colspan="3">THÔNG TIN TIN VỀ TRƯỜNG</th>
            <th scope="col" rowspan="2" class="py-5">Ảnh</th>
            <th scope="col" rowspan="2" class="py-5">Sửa</th>
            <th scope="col" rowspan="2" class="py-5">Xóa</th>
        </tr>
        <tr>
            <td>Họ và tên</td>
            <td>Giới tính</td>
            <td>Số điện thoại</td>
            <td>Trạng thái</td>
            <td>Mã số sinh viên</td>
            <td> Email</td>
            <td>Tên ngành</td>
        </tr>
    </thead>
    <?php $i = 1;
    foreach ($dm as $row) { ?>
        <tr>
            <th style="width: 80px;">
                <div class="checkbox">
                    <input type="checkbox" class="checkitem mr-1" value='<?= $row['id_user'] ?>'><?= $i++ ?>
                </div>
            </th>
            <td class="py-5">
                <?= $row['ho_ten'] ?>
            </td>

            <td class="py-5">
                <?= ($row['gioi_tinh'] == 1) ? "Nam" : "Nữ"; ?>
            </td>
            <td class="py-5">
                <?= $row['sdt'] ?>
            </td>
            <td class="py-5">
                <?php $phieu = getUngtuyenByID($row['id_sv']); ?>
                <?php if ($row['trang_thai'] == 0) { ?>
                    <b>Chưa có nơi thực tập</b>
                <?php } elseif ($row['trang_thai'] == 1) { ?>
                    <b>Đang thực tập</b><br>
                    <?php $dn = getDoanhnghiepByID($phieu['id_dn']); ?>
                    <?= $dn['ten_dn'] ?>
                <?php } else { ?>
                    <b>Đã hoàn thành thực tập</b><br>
                    <?php $dn = getDoanhnghiepByID($phieu['id_dn']); ?>
                    <?= $dn['ten_dn'] ?>
                <?php } ?>
                
            </td>
            <td class="py-5">
                <?= $row['mssv'] ?>
            </td>
            <td class="py-5">
                <?php
                $ds = getAllUser();
                foreach ($ds as $r) { ?>
                    <?php if ($row['id_user'] == $r['id_user']) { ?>
                        <?= $r['email'] ?>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="py-5">
                <?php

                $ds = getAllNganh();
                foreach ($ds as $r) { ?>
                    <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                        <?= $r['ten_nganh'] ?>
                    <?php } ?>
                <?php } ?>

            </td>
            <td style="width: 150px;">
                <img src="views/images/<?= $row['anh'] ?>" width="100" height="70" onerror="this.src='views/images/avt.jpg';">
            </td>
            <td class="py-5">
                <a href="?ctrl=sinh_vien&act=edit&id_sv=<?= $row['id_sv'] ?>"><i class="fa fa-edit"></i></a>
            </td>
            <td class="py-5">
                <a href="?ctrl=sinh_vien&act=delete&id_user=<?= $row['id_user'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
    <?php } ?>

</table>
<script>
    $("#checkall").change(function() {
        $(".checkitem").prop("checked", $(this).prop("checked"))
    })
    $(".checkitem").change(function() {
        if ($(this).prop("checked") == false) {
            $("#checkall").prop("checked", false)
        }
        if ($(".checkitem:checked").length == $(".checkitem").length) {
            $("#checkall").prop("checked", true)
        }
    })
    $("#xoaall").click(function() {
        if ($(".checkitem:checked").length > 0) {
            var y = confirm("Bạn chắc chắn muốn xóa các mục đã chọn không ?");
            if (y == true) {
                let arrcheck = [];
                $(".checkitem").each(function() {
                    check = $(this).prop("checked");
                    if (check) {
                        arrcheck.push($(this).val());
                    }
                });
                console.log(arrcheck);
                $.ajax({
                    type: "post",
                    url: "index.php?ctrl=sinh_vien",
                    data: {
                        arr: arrcheck
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        }
    });
    $(document).ready(function() {
        $("#user").blur(function() {
            u = $(this).val();
            $("#kqcheckuser").load("<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=kiemtrauser&user=" + u);
        });
    });
    $(document).ready(function() {
        $("#mssv").blur(function() {
            u = $(this).val();
            $("#kqcheckmssv").load("<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=kiemtramssv&mssv=" + u);
        });
    });
    $(document).ready(function() {
        $("#email").blur(function() {
            u = $(this).val();
            $("#kqcheckemail").load("<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=kiemtraemail&email=" + u);
        });
    });
</script>