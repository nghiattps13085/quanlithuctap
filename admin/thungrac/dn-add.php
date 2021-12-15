<form method="POST" class="col-8 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=insert" enctype="multipart/form-data">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Thêm doanh nghiệp</h1>
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
        <input type="text" class="form-control" id="user" name="ten_dn" required placeholder="Tên doanh nghiệp">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="user" name="dia_chi" required placeholder="Địa chỉ">

    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="user" name="website" required placeholder="website">

    </div>
    <div class="row">
        <div class="form-group col-6">
            <input type="file" class="form-control" name="anh" placeholder="Mã số sinh viên">
        </div>
        <div class="form-group col-6">
            <input type="number" class="form-control" id="sdt" name="sdt" required placeholder="Số điện thoại">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="">Ẩn hiện: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="an_hien1" value="0" checked>
                <label class="form-check-label"> Hiện</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="an_hien2" value="1">
                <label class="form-check-label">Ẩn</label>
            </div>
        </div>
    </div>
    <div class="row form-group  justify-content-center align-items-center ">
        <button type="submit" class="btn btn-primary">Lưu lại</button>
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

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>