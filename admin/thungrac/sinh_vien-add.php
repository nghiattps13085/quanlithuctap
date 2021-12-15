<?php
require_once "views/Classes/PHPExcel.php";
require_once "models/excel.php";

if(isset($_POST['btn'])){
    $file= $_FILES['file']['tmp_name'];
    $objReader=PHPExcel_IOFactory::createReaderForFile($file);
    $objReader -> setLoadSheetsOnly('Sheet1');

    $objExcel = $objReader->load($file);
    $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);

    $highRow=$objExcel->setActiveSheetIndex()->getHighestRow();

    for($row=2;$row<=$highRow;$row++){
        $user=$sheetData[$row]['A'];
        $pass=$sheetData[$row]['B'];
        $email=$sheetData[$row]['C'];
        $chuc_vu=0;

        addNewUserE($user,$pass,$email,$chuc_vu);
    $id_user_full = seach_id_user($email);
    $id_user =   $id_user_full['id_user'];

      $mssv=$sheetData[$row]['D'];
      $ho_ten=$sheetData[$row]['E'];
      $id_nganh=$sheetData[$row]['F'];
      $id_nganh=tim_id_nganh($id_nganh);
      $id_nganh= $id_nganh['id_nganh'];
      addNewSinhvienforexecl($id_user, $mssv, $id_nganh, $ho_ten);
    }
}
?>
    <form method="POST" class="col-6 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=insert" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center text-warning">
            <h1>Thêm sinh viên</h1>
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
                <select name="id_nganh" class="form-control">
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
                <input type="file" class="form-control" name="anh" placeholder="Mã số sinh viên">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="">Giới tính:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh1" value="1" checked>
                    <label class="form-check-label"> Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh0" value="0">
                    <label class="form-check-label">Nữ</label>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="">Trạng thái:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai1" value="1">
                    <label class="form-check-label"> Đã có nơi thực tập</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai0" value="0" checked>
                    <label class="form-check-label">Chưa có nơi thực tập</label>
                </div>
            </div>
        </div>
        <div class="row form-group  justify-content-center align-items-center ">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>
    <form method="POST" class="col-10 mx-auto border border-warning p-2 shadow rounded mt-5" action="" enctype="multipart/form-data">
    <h1>Để upload thành công file excel của bạn phải có dạng như hình dưới đây</h1>
    <img src="../uploads/Excel.PNG" width="100%" alt="" class="mb-5">
</br>
    <input type="file" name="file" >
    <button type="submit" name="btn">uploads</button>
    </form>

    <script>
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

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
