<th colspan="7">
    <div class="row justify-content-center align-items-center px-3">
        <div class="alert alert-primary w-100  mt-4 " role="alert">
            <h1>Danh sách đăng tuyển của bạn</h1>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
                </ol>
            </nav> -->
        </div>
    </div>
</th>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
    <i class="fas fa-plus"></i> Thêm đăng tuyển
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm đăng tuyển</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= SITE_URL ?>/?ctrl=dang_tuyen&act=insert" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tieu_de" required placeholder="Tiêu đề...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="user" name="yeu_cau" required placeholder="Yêu cầu">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <select name="id_nganh" class="form-control">
                                <option value="">Chọn ngành</option>
                                <?php
                                $nganh = getAllNganh();
                                foreach ($nganh as $n) { ?>
                                    <option value="<?= $n['id_nganh'] ?>"> <?= $n['ten_nganh'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <div class="custom-file ">
                                <input type="file" class="custom-file-input " id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="anh">
                                <label class="custom-file-label " for="inputGroupFile01">ẢNH</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="number" class="form-control" id="user" name="sl_sv_can" required placeholder="Số lượng sinh viên cần">
                        </div>
                        <div class="form-group col-6">
                            <input type="number" class="form-control" id="user" name="luong" required placeholder="Lương">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" class="form-control" id="user" name="quyen_loi" required placeholder="Quyền lợi">
                        </div>
                        <div class="form-group col-6">
                            <input type="number" class="form-control" id="user" name="thoi_gian" required placeholder="Thời gian">
                        </div>
                    </div>
                    <textarea name="mo_ta" id="" cols="60" rows="5" required placeholder="Mô tả"></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-primary">Lưu đăng tuyển</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<table class="table table-bordered table-hover ">
    <thead class="bg-primary text-white">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Tên doanh nghiệp</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Ngành tuyển</th>
            <th scope="col">Chi tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($ds as $row) { ?>
            <tr>
                <td>
                    <?= $i++ ?>
                </td>
                <td>
                    <?php
                    $ds = getAllDoanhnghiep();
                    foreach ($ds as $r) { ?>
                        <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                            <?= $r['ten_dn'] ?>
                        <?php } ?>
                    <?php } ?>

                </td>
                <td>
                    <?= ucfirst($row['tieu_de']) ?>
                </td>
                <td>
                    <?php
                    $ds = getAllNganh();
                    foreach ($ds as $r) { ?>
                        <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                            <?= $r['ten_nganh'] ?>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td><a href="<?= SITE_URL ?>/?ctrl=dang_tuyen&act=chi_tiet&id_dt=<?= $row['id_dt'] ?>"><b>Xem chi
                            tiết</b></a><br></td>
            </tr>
        <?php } ?>


        <!-- <?php $i = 1;
                foreach ($ds as $row) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <b><?= ucfirst($row['tieu_de']) ?></b><br>
                <?php
                    $ds = getAllDoanhnghiep();
                    foreach ($ds as $r) { ?>
                <?php if ($row['id_dn'] == $r['id_dn']) { ?>
                <b>Tên doanh nghiệp:</b> <?= $r['ten_dn'] ?><br>
                <?php } ?>
                <?php } ?>
                <?php require_once "models/nganh.php";
                    $ds = getAllNganh();
                    foreach ($ds as $r) { ?>
                <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                <b>Ngành tuyển:</b> <?= $r['ten_nganh'] ?><br>
                <?php } ?>
                <?php } ?>
            </td>

            <td>
                <a href="<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=chi_tiet&id_dt=<?= $row['id_dt'] ?>"><b>Xem chi
                        tiết</b></a><br>
            </td>
        </tr>
        <?php } ?> -->
    </tbody>
</table>