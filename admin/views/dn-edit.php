<form method="POST" class="col-10 mx-auto border  shadow-lg px-4 py-3 shadow rounded mt-2 mb-4"
    action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=update" enctype="multipart/form-data">
    <div class="overflow-hidden">
        <div class="alert alert-primary w-100 p-3" role="alert">
            <h1>SỬA THÔNG TIN DOANH NGHIỆP</h1>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
                </ol>
            </nav> -->
        </div>
    </div>
    <div class="form-group">
        <input type="hidden" name="id_dn" value="<?= $row['id_dn'] ?>">
        <div class="form-group">
            <label for="">Email</label>
            <?php
                require_once "models/doanh_nghiep.php";
                $ds = getAllUser();
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
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <?php $ds = getAllUser();
            foreach ($ds as $u) { ?>
            <?php if ($row['id_user'] == $u['id_user']) { ?>
            <input type="text" class="form-control" required id="email" name="pass" value="<?= $u['pass'] ?>">
            <?php } ?>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="">Tên doanh nghiệp</label>
            <input type="text" class="form-control" id="user" name="ten_dn" required placeholder="Tên doanh nghiệp"
                value="<?= $row['ten_dn'] ?>">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" id="user" name="dia_chi" required placeholder="Địa chỉ"
                value="<?= $row['dia_chi'] ?>">
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
            <div class="form-group col-6">
                <label for="">Số điện thoại</label>
                <input type="number" class="form-control" id="sdt" name="sdt" required value="<?= $row['sdt'] ?>">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-6">
                <label for="">Trạng thái:</label><br>
                <div class="custom-control custom-radio form-check-inline">
                    <input type="radio" id="anhien1" name="an_hien" class="custom-control-input" value="o"
                        <?= ($row['an_hien'] == 1) ? "checked" : ""; ?>>
                    <label class="custom-control-label" for="anhien1"> Hiện</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="anhien0" name="an_hien" class="custom-control-input" value="1"
                        <?= ($row['an_hien'] == 0) ? "checked" : ""; ?>>
                    <label class="custom-control-label" for="anhien0"> Ẩn </label>
                </div>
                <!-- <label for="">Ẩn hiện: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="0"
                        <?= ($row['an_hien'] == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="anhien1"> Hiện </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="1"
                        <?= ($row['an_hien'] == 0) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="anhien0">Ẩn</label>
                </div> -->
            </div>
        </div>
        <div class="row form-group  justify-content-center align-items-center ">
            <button type="submit" class="btn btn-primary px-4">Lưu lại</button>
        </div>
</form>
<script>
$(document).ready(function() {
    $("#user").blur(function() {
        u = $(this).val();
        $("#kqcheckuser").load("<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=kiemtrauser&user=" + u);
    });
});
$(document).ready(function() {
    $("#email").blur(function() {
        u = $(this).val();
        $("#kqcheckemail").load("<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=kiemtraemail&email=" + u);
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>