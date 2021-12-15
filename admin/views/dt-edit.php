
    <form method="POST" class="col-10 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=update" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center text-warning">
            <h1>Sửa đăng tuyển</h1>
        </div>
        <div class="form-group">
        <input type="hidden" name="id_dt" value="<?= $row['id_dt'] ?>">
        <label for="">Tên doanh nghiệp </label>
        <?php 
            $ds = getAllDoanhnghiep();
            foreach ($ds as $r) { ?>
                <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                    <input type="text" class="form-control" id="user" name="ten_dn" required value="<?= $r['ten_dn'] ?>">
                <?php } ?>
            <?php } ?>
            <?php if (isset($user_error)) { ?>
                <span class="badge badge-warning"> <?= $user_error ?> </span>
            <?php } ?>
            <span id="kqcheckuser"></span>
        </div>
        <div class="row">
            <div class="form-group col-6">
            <label for="">Tên ngành </label>
            <select name="id_nganh" class="form-control">
                    <?php  require_once "models/nganh.php";
                    $ds=getAllNganh();
                     foreach ($ds as $n) { ?>
                        <?php if ($n['id_nganh'] == $row['id_nganh']) { ?>
                            <option value="<?= $n['id_nganh'] ?>" selected="selected"> <?= $n['ten_nganh'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $n['id_nganh'] ?>"> <?= $n['ten_nganh'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-6">
            <label for="">Ảnh </label>
                <input type="file" class="form-control" name="anh">
            </div>
        </div>
        <div class="form-group">
        <label for="">Tiêu đề </label>
            <input type="text" class="form-control" name="tieu_de" required placeholder="Tiêu đề..." value="<?=$row['tieu_de']?>">
        </div>
        <div class="form-group">
        <label for="">Yêu cầu </label>
            <input type="text" class="form-control" id="user" name="yeu_cau" required value="<?=$row['yeu_cau']?>">
        </div>
        <div class="row">
            <div class="form-group col-6">
            <label for="">Số lượng sinh viên cần </label>
                <input type="number" class="form-control" id="user" name="sl_sv_can" required value="<?=$row['sl_sv_can']?>">
            </div>
            <div class="form-group col-6">
            <label for="">Số lượng sinh viên đã đăng ký </label>
                <input type="number" class="form-control" id="user" name="sl_sv_dk" required value="<?=$row['sl_sv_dk']?>">
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="form-group col-6">
            <label for="">Ẩn hiện: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="0" <?= ($row['an_hien'] == 0) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="anhien1"> Hiện </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="1" <?= ($row['an_hien'] == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="anhien0">Ẩn</label>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="">Trạng thái: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" value="0"  <?= ($row['an_hien'] == 0) ? "checked" : ""; ?>>
                    <label class="form-check-label">Duyệt</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" value="1"  <?= ($row['an_hien'] == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label">Chưa duyệt</label>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label for="">Nội dung </label>
                <textarea class="form-control" name="noi_dung" rows="5" placeholder="Nội dung"><?=$row['noi_dung']?></textarea>
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

