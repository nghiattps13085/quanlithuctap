

    <form method="POST" class="col-10 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=insert" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center text-warning">
            <h1>Thêm đăng tuyển</h1>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="ten_dn" name="ten_dn" required placeholder="Tên doanh nghiệp">
            <?php if (isset($dn_error)) { ?>
                <span class="badge badge-warning"> <?= $dn_error ?> </span>
            <?php } ?>
            <span id="kqcheckdn"></span>
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
                <input type="file" class="form-control" name="anh" placeholder="Mã số sinh viên">
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="tieu_de" required placeholder="Tiêu đề...">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="user" name="yeu_cau" required placeholder="Yêu cầu">
        </div>
        <div class="row">
            <div class="form-group col-6">
                <input type="number" class="form-control" id="user" name="sl_sv_can" required placeholder="Số lượng sinh viên cần">
            </div>
            <div class="form-group col-6">
                <input type="number" class="form-control" id="user" name="sl_sv_dk" required placeholder="Số lượng sinh viên đăng ký">
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="">Ẩn hiện: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="an_hien1" value="0" checked>
                    <label class="form-check-label"> Hiện</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="an_hien" id="an_hien2" value="1">
                    <label class="form-check-label">Ẩn</label>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="">Trạng thái: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" value="0" checked>
                    <label class="form-check-label">Duyệt</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trang_thai" value="1">
                    <label class="form-check-label">Chưa duyệt</label>
                </div>
            </div>
        </div>
        <div class="form-group">
                <textarea class="form-control" name="noi_dung" rows="5" placeholder="Nội dung"></textarea>
            </div>
        <div class="row form-group  justify-content-center align-items-center ">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $("#ten_dn").blur(function() {
                u = $(this).val();
                $("#kqcheckdn").load("<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=kiemtraten_dn&ten_dn=" + u);
            });
        });
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

