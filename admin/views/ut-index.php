<th colspan="7">
    <div class="row justify-content-center align-items-center px-3 ">
        <div class=" alert alert-primary w-100  mt-4 " role="alert">
            <h1>Danh sách sinh viên</h1>
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
            <th scope="col">Tiêu đề bài đăng</th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Ngày đăng kí ứng tuyển</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Nguyện vọng</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
            foreach ($ds as $row) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <?php
                        $ds = getAllDangtuyen();
                        foreach ($ds as $r) { ?>
                <?php if ($row['id_dt'] == $r['id_dt']) { ?>
                <?= $r['tieu_de'] ?>
                <?php } ?>
                <?php } ?>
                <!-- <?php
                        $ds = getAllSinhvien();
                        foreach ($ds as $r) { ?>
                <?php if ($row['id_sv'] == $r['id_sv']) { ?>
                <b>Tên sinh viên:</b><?= $r['ho_ten'] ?><br>
                <?php } ?>
                <?php } ?>
                <b>Ngày đăng ký ứng tuyển :</b><?= $row['ngay_dk'] ?><br>
                <b>Trạng thái:</b> <?= ($row['trang_thai'] == 0) ? "Chưa duyệt" : "Đã duyệt"; ?><br> -->
            </td>
            <td>
                <?php
                        $ds = getAllSinhvien();
                        foreach ($ds as $r) { ?>
                <?php if ($row['id_sv'] == $r['id_sv']) { ?>
                <?= $r['ho_ten'] ?>
                <?php } ?>
                <?php } ?>
            </td>
            <td>
                </b><?= $row['ngay_dk'] ?>
            </td>
            <td>
                </b> <?= ($row['trang_thai'] == 0) ? "Chưa duyệt" : "Đã duyệt"; ?>
            </td>
            <td>
                <?= $row['nguyen_vong'] ?>
        </tr>
        <?php } ?>
    </tbody>
</table>