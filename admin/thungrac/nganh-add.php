
<form method="POST" class="col-6 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=nganh&act=insert">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Thêm ngành</h1>
    </div>
        <div class="form-group">
            <select name="id_nn" class="form-control" required>
                <option value="">Chọn nhóm ngành</option>
                <?php require_once "models/nhom_nganh.php";
                $ds = getAllNhomnganh();
                foreach ($ds as $row) { ?>
                    <option value="<?= $row['id_nn'] ?>"> <?= $row['ten_nn'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ten_loai">Tên ngành</label>
            <input type="text" class="form-control"  name="ten_nganh">
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="1" checked>
                <label class="form-check-label" for="anhien1"> Hiện </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="0">
                <label class="form-check-label" for="anhien0">Ẩn</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
</form>

