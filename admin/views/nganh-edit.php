


    <form method="POST" class="col-10 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=nganh&act=update">
        <div class="row justify-content-center align-items-center text-warning">
            <h1>Sửa ngành</h1>
        </div>
        <input type="hidden" name="id_nganh" value="<?=$row['id_nganh']?>">
        <div class="form-group">
        <label for="ten_loai">Tên nhóm ngành</label>
            <select name="id_nn" class="form-control">
                <?php require_once "models/nhom_nganh.php";
                $ds = getAllNhomnganh();
                foreach ($ds as $nn) { ?>
                    <?php if ($row['id_nn'] == $nn['id_nn']) { ?>
                        <option value="<?= $nn['id_nn'] ?>" selected="selected"> <?= $nn['ten_nn'] ?></option>
                    <?php } else { ?>
                        <option value="<?= $nn['id_nn'] ?>"> <?= $nn['ten_nn'] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ten_loai">Tên ngành</label>
            <input type="text" class="form-control" name="ten_nganh" value="<?= $row['ten_nganh'] ?>">
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="an_hien" id="anhien1" value="1" <?= ($row['an_hien'] == 1) ? "checked" : ""; ?>>
            <label class="form-check-label" for="anhien1"> Hiện </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="an_hien" id="anhien0" value="0" <?= ($row['an_hien'] == 0) ? "checked" : ""; ?>>
            <label class="form-check-label" for="anhien0">Ẩn</label>
        </div>
        <div class="row form-group  justify-content-center align-items-center ">
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>