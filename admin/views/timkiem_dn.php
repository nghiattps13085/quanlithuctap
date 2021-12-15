<th colspan="7">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Danh sách doanh nghiệp</h1>
    </div>
</th>
<form method="POST" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=timkiem">
    <div class="input-group">
        <input class="form-control" name="ten_dn" type="text" placeholder="Nhập tên công ty cần tìm..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<table class="table table-bordered table-hover ">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Thêm doanh nghiệp <i class="fas fa-plus-square"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=insert" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="file" class="form-control overflow-hidden" name="anh" placeholder="Mã số sinh viên">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover ">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Thông tin</th>
                <th scope="col">Liên hệ</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($dn as $row) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td>
                        <img src="views/images/<?= $row['anh'] ?>" width="150" height="100" onerror="this.src='views/images/avt.jpg';">
                    </td>
                    <td>
                        <b>Tên doanh nghiệp:</b> <?= $row['ten_dn'] ?><br>
                        <?php
                        $id_dn = $row['id_dn'];
                        $soluong = demBaidang($id_dn);
                        ?>
                        <?php
                        $dt = getAllDangtuyen();
                        foreach ($dt as $t) { ?>
                            <?php if ($t['id_dn'] == $row['id_dn']) { ?>
                                <?php $id_dt = $t['id_dt']; ?>
                                <?php $soluongsv = demSinhvien($id_dt); ?>
                                <?php if ($soluongsv > 0) { ?>
                                    <b>Số lượng sinh viên đang thực tập:<a href="?ctrl=dang_tuyen&act=ung_tuyen&id_dt=<?= $t['id_dt'] ?>"> <?= $soluongsv ?></a></b><br>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <b>Số lượng bài đăng tuyển:<a href="?ctrl=dang_tuyen&act=theodn&id_dn=<?= $row['id_dn'] ?>"><?= $soluong ?></a></b> <br>
                        <b>Ẩn hiện:</b> <?= ($row['an_hien'] == 0) ? "Đang hiện" : "Đang ẩn"; ?><br>
                    </td>
                    <td>
                        <b>Địa chỉ :</b><?= $row['dia_chi'] ?><br>
                        <b>Số điện thoại :</b><?= $row['sdt'] ?><br>
                        <?php
                        $ds = getAllUser();
                        foreach ($ds as $u) { ?>
                            <?php if ($u['id_user'] == $row['id_user']) { ?>
                                <b>Email:</b> <?= $u['email']; ?>
                            <?php } ?>
                        <?php } ?>
                    </td>
                    </td>
                    <td><a href="?ctrl=doanh_nghiep&act=edit&id_dn=<?= $row['id_dn'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td><a href="?ctrl=doanh_nghiep&act=delete&id_user=<?= $row['id_user'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fas fa-trash-alt"></i></a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>