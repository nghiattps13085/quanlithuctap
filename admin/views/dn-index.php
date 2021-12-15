<div class="row">
    <div class="alert alert-primary w-100 p-3" role="alert">
        <h1>QUẢN LÝ DOANH NGHIỆP</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Danh sách doanh nghiệp</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row px-3">
    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModalLong">
        Thêm doanh nghiệp <i class="fas fa-plus-square"></i>
    </button>
    <input id="xoaall" type="submit" name="xoaall" class="btn btn-danger" value="Xóa Mục Đã Chọn">
    <form method="POST" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 " action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=timkiem">
        <div class="input-group">
            <input class="form-control" name="ten_dn" type="text" placeholder="Nhập doanh nghiệp cần tìm..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>

    </form>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h3 class="modal-title">Thêm doanh nghiệp</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= ADMIN_URL ?>/?ctrl=doanh_nghiep&act=insert" enctype="multipart/form-data">
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white" id="inputGroupFileAddon01">UPLOAD</span>
                                </div>
                                <div class="custom-file  ">
                                    <input type="file" class="custom-file-input " id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="anh">
                                    <label class="custom-file-label " for="inputGroupFile01">ẢNH</label>
                                </div>
                            </div>
                            <!-- <input type="file" class="form-control overflow-hidden" name="anh"
                                placeholder="Mã số sinh viên"> -->
                        </div>
                        <div class="form-group col-6">
                            <input type="number" class="form-control" id="sdt" name="sdt" required placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-12 border-top pt-3">
                        <div class="form-group form-check-inline">

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="an_hien" class="custom-control-input" value="0" checked>
                                <label class="custom-control-label" for="customRadio1">Hiện</label>
                            </div>
                            <div class="custom-control custom-radio ml-3">
                                <input type="radio" id="customRadio2" name="an_hien" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadio2">Ẩn</label>
                            </div>
                            <!-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="an_hien" id="an_hien1" value="0"
                                    checked>
                                <label class="form-check-label"> Hiện</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="an_hien" id="an_hien2" value="1">
                                <label class="form-check-label">Ẩn</label>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger px-3 mt-3" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-primary px-3 mt-3">Lưu thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered  table-hover Nghia-admin-tb mt-2">
    <thead class="bg-primary">
        <tr class="text-center">
            <th scope="col" rowspan="2" class="py-5"><input type="checkbox" name="checkall " class="checkall mr-2"> #
            </th>
            <th scope="col" colspan="3">THÔNG TIN DOANH NGHIỆP</th>
            <th scope="col" colspan="3">THÔNG TIN LIÊN LẠC</th>
            <th scope="col" rowspan="2" class="py-5">Ảnh</th>
            <th scope="col" rowspan="2" class="py-5">Sửa</th>
            <th scope="col" rowspan="2" class="py-5">Xóa</th>
        </tr>
        <tr>
            <td>Tên doanh nghiệp</td>
            <td>Bài đăng</td>
            <td>Sinh viên</td>
            <td>Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Email</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dn as $row) { ?>
            <tr>
                <th class="py-5">
                    <div class="checkbox d-flex align-items-center"><input type="checkbox" class="checkitem mr-2" value='<?= $row['id_user'] ?>'>
                        <div><?= $i++ ?></div>
                    </div>
                </th>
                <td class="py-5">
                    <?= $row['ten_dn'] ?>
                </td>
                <td class="py-5">
                    <?php
                    $id_dn = $row['id_dn'];
                    $soluong = demBaidang($id_dn);
                    ?>
                    <?php
                    $dt = getAllDangtuyen();
                    foreach ($dt as $t) { ?>
                        <?php if ($t['id_dn'] == $row['id_dn']) { ?>
                            <?php $id_dt = $t['id_dt']; ?>
                            <?php $soluongsv = demSinhvien($id_dn); ?>
                           
                        <?php } ?>
                    <?php } ?>
                    <a href="?ctrl=dang_tuyen&act=theodn&id_dn=<?= $row['id_dn'] ?>"><?= $soluong ?></a>
                </td>
                <td class="py-5 text-success" style="font-size: 20pt;">
                             <?=$soluongsv ?>
                </td>
             
                <td class="py-5 ">
                    <?= $row['dia_chi'] ?>
                </td>
                <td class="py-5">
                    <?= $row['sdt'] ?>
                </td>
                <td class="py-5">
                    <?php
                    $ds = getAllUser();
                    foreach ($ds as $u) { ?>
                        <?php if ($u['id_user'] == $row['id_user']) { ?>
                            <?= $u['email']; ?>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td>
                    <img src="views/images/<?= $row['anh'] ?>" width="100" height="70" onerror="this.src='views/images/avt.jpg';">
                </td>
                <td class="py-5">
                    <a href="?ctrl=doanh_nghiep&act=edit&id_dn=<?= $row['id_dn'] ?>"><i class="fa fa-edit"></i></a>
                </td>
                <td class="py-5">
                    <a href="?ctrl=doanh_nghiep&act=delete&id_user=<?= $row['id_user'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>

                <!-- 

            </tr>
            <tr>
                <td><?= $i++ ?></td>
                <td>
                    <img src="views/images/<?= $row['anh'] ?>" width="150" height="100"
                        onerror="this.src='views/images/avt.jpg';">
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
                    <b>Số lượng sinh viên đang thực tập:<a
                            href="?ctrl=dang_tuyen&act=ung_tuyen&id_dt=<?= $t['id_dt'] ?>">
                            <?= $soluongsv ?></a></b><br>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <b>Số lượng bài đăng tuyển:<a
                            href="?ctrl=dang_tuyen&act=theodn&id_dn=<?= $row['id_dn'] ?>"><?= $soluong ?></a></b> <br>
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
                <td><a href="?ctrl=doanh_nghiep&act=delete&id_user=<?= $row['id_user'] ?>"
                        onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fas fa-trash-alt"></i></a>

                </td>
            </tr> -->
            <?php } ?>
    </tbody>
</table>

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
    $(".checkall").change(function() {
        // $(".checkall").prop("checked",$(this).prop("checked"));
        $(".checkitem").prop("checked", $(this).prop("checked"));
    })
    $(".checkitem").change(function() {
        if ($(this).prop("checked") == false) {
            $(".checkall").prop("checked", false)
        }
        if ($(".checkitem:checked").length == $(".checkitem").length) {
            $(".checkall").prop("checked", true)
        }
    })
    $("#xoaall").click(function() {
        if ($(".checkitem:checked").length > 0) {
            var y = confirm("Bạn chắc chắn muốn xóa các mục đã chọn không ?");
            if (y == true) {
                let arrcheck = [];
                $(".checkitem").each(function() {
                    check = $(this).prop("checked");
                    if (check) {
                        arrcheck.push($(this).val());
                    }
                });
                console.log(arrcheck);
                $.ajax({
                    type: "post",
                    url: "index.php?ctrl=doanh_nghiep",
                    data: {
                        arr: arrcheck
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        }
    });
</script>