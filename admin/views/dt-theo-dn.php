<th colspan="7">
    <div class="row justify-content-center align-items-center px-3">
        <div class="alert alert-primary w-100  mt-4 " role="alert">
            <h1>Danh sách đăng tuyển</h1>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home    "></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách sinh viên</li>
                </ol>
            </nav> -->
        </div>
    </div>
</th>
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
                    <?php require_once "models/nganh.php";
                    $ds = getAllNganh();
                    foreach ($ds as $r) { ?>
                        <?php if ($row['id_nganh'] == $r['id_nganh']) { ?>
                            <?= $r['ten_nganh'] ?>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td><a href="<?= ADMIN_URL ?>/?ctrl=dang_tuyen&act=chi_tiet&id_dt=<?= $row['id_dt'] ?>"><b>Xem chi
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