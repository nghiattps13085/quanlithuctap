<form method="POST" class="col-10 mx-auto border  shadow-lg px-4 py-3  rounded mt-4"
    action="<?= ADMIN_URL ?>/?ctrl=sinh_vien&act=update" enctype="multipart/form-data">
    <div class=" overflow-hidden">
        <div class="alert alert-primary w-100 p-3" role="alert">
            <h1>SỬA THÔNG TIN SINH VIÊN</h1>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
                </ol>
            </nav> -->
        </div>
    </div>
    <input type="hidden" name="id_sv" value="<?= $row['id_sv'] ?>">
    <div class="row">
        <div class="form-group col-6">
            <label for="">Email</label>
            <?php $ds = getAllUser();
                foreach ($ds as $u) { ?>
            <?php if ($row['id_user'] == $u['id_user']) { ?>
            <input type="email" class="form-control" required id="email" name="email" value="<?= $u['email'] ?>">
            <?php } ?>
            <?php } ?>
            <?php if (isset($email_error)) { ?>
            <span class="badge badge-warning"> <?= $email_error ?> </span>
            <?php } ?>
            <span id="kqcheckemail"></span>
        </div>
        <div class="form-group col-6">
            <label for="">Mật khẩu</label>
            <?php $ds = getAllUser();
                foreach ($ds as $u) { ?>
            <?php if ($row['id_user'] == $u['id_user']) { ?>
            <input type="text" class="form-control" required id="email" name="pass" value="<?= $u['pass'] ?>">
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="">Mã số sinh viên</label>
            <input type="text" class="form-control" id="mssv" name="mssv" required value="<?= $row['mssv'] ?>">
            <?php if (isset($mssv_error)) { ?>
            <span class="badge badge-warning"> <?= $mssv_error ?> </span>
            <?php } ?>
            <span id="kqcheckmssv"></span>
        </div>
        <div class="form-group col-6">
            <label for="">Số điện thoại</label>
            <input type="number" class="form-control" id="sdt" name="sdt" required value="<?= $row['sdt'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="">Họ tên sinh viên</label>
            <input type="text" class="form-control" id="user" name="ho_ten" required value="<?= $row['ho_ten'] ?>">
        </div>
        <div class="form-group col-6">
            <label for="">Tên ngành</label>
            <select name="id_nganh" class="form-control" required>
                <option value="">Chọn ngành</option>
                <?php require_once "models/nganh.php";
                    $ds = getAllNganh();
                    foreach ($ds as $r) { ?>
                <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                <option value="<?= $r['id_nganh'] ?>" selected="selected"> <?= $r['ten_nganh'] ?></option>
                <?php } else { ?>
                <option value="<?= $r['id_nganh'] ?>"> <?= $r['ten_nganh'] ?></option>
                <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="">Hình ảnh</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white" id="inputGroupFileAddon01">UPLOAD</span>
                </div>
                <div class="custom-file  ">
                    <input type="file" class="custom-file-input " id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label " for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group col-6  ">
            <label for="">Giới tính :</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-white " for="gender3">GENDER</label>
                </div>
                <select class="custom-select" id="gender3" name="gioi_tinh">
                    <option value="0" <?= ($row['gioi_tinh'] == 0) ? "selected" : ""; ?>>Nam</option>
                    <option value="1" <?= ($row['gioi_tinh'] == 1) ? "selected" : ""; ?>>Nữ</option>
                </select>
            </div>
            <!-- <label for="">Giới tính :</label>
            <select name="gioi_tinh" id="" class="form-control">
                <option value="0" <?= ($row['gioi_tinh'] == 0) ? "selected" : ""; ?>>Nam</option>
                <option value="1" <?= ($row['gioi_tinh'] == 1) ? "selected" : ""; ?>>Nữ</option>
            </select> -->
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="">Trạng thái:</label><br>
            <div class="custom-control custom-radio">
                <input type="radio" id="trang_thai1" name="trang_thai" class="custom-control-input" value="1"
                    <?= ($row['trang_thai'] == 1) ? "checked" : ""; ?>>
                <label class="custom-control-label" for="trang_thai1"> Đã có nơi thực tập</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="trang_thai0" name="trang_thai" class="custom-control-input" value="0"
                    <?= ($row['trang_thai'] == 0) ? "checked" : ""; ?>>
                <label class="custom-control-label" for="trang_thai0"> Chưa có nơi thực tập</label>
            </div>
        </div>
        <!-- <div class="form-group col-6">
            <label for="">Trạng thái:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai1" value="1"
                    <?= ($row['trang_thai'] == 1) ? "checked" : ""; ?>>
                <label class="form-check-label"> Đã có nơi thực tập</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai0" value="0"
                    <?= ($row['trang_thai'] == 0) ? "checked" : ""; ?>>
                <label class="form-check-label">Chưa có nơi thực tập</label>
            </div>
        </div> -->
    </div>
    <div class="row form-group  justify-content-center align-items-center ">
        <button type="submit" class="btn btn-primary px-4">Lưu lại</button>
    </div>
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