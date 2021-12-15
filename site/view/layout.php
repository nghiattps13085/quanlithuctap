<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thực tập</title>
    <!-- <script src="sweetalert2.all.min.js"></script>
    Optional: include a polyfill for ES6 Promises for IE11 
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
    <link rel="shortcut icon" href="view/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <header id="header" class="fixed-top shadow-sm border-bottom bg-light">
        <div class="wrap d-flex justify-content-between align-items-center">
            <div id="header-menu" class="col p-0">
                <button id="sidebarToggle" class="btn btn-light border-right rounded-0 p-4 ">
                    <i class="fas fa-bars"></i>
                    <span class="d-none d-md-inline ml-3">MENU</span>
                </button>
            </div>
            <a id="header-logo" href="index.php" class="col text-center">
                <img src="view/images/logo-2.png" alt="">
            </a>
            <?php if (isset($_SESSION['sid'])) { ?>
                <div id="header-login" class="col p-0">
                    <div class="d-none d-lg-flex justify-content-end h-100 ">
                        <?php if (isset($_SESSION['schuc_vu']) && ($_SESSION['schuc_vu']) == 0) { ?>
                            <div class="btn-group" role="group">
                                <a id="btnGroupDrop1" type="button" class="dropdown-toggle btn bg-tomato rounded-0  h-100 border-left   p-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle mr-2 "></i> <?php $ttsv = checkkhachhangbyid($_SESSION['sid']);
                                                                                $tttk = checktaikhoanbyid($_SESSION['sid']);
                                                                                echo $ttsv['ho_ten'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right w-200 " aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=sinh_vien"><i class="fas fa-list-alt mr-2"></i> Kiểm Tra Thông Tin </a>
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=home"><i class="fas fa-history    mr-2"></i> Lịch Sử Đơn</a>
                                    <a class="dropdown-item" href="index.php?ctrl=sinh_vien&act=user_edit">
                                        <i class="far fa-key  mr-2"></i>
                                        Đổi mật khẩu
                                    </a>
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=home&act=logout"><i class="fas fa-sign-out-alt   mr-2 "></i> Đăng xuất</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group" role="group">
                                <a data-toggle="modal" data-target="#exampleModal-Nghia" href="#login" class="btn btn-light rounded-0 h-100 border-left p-4" role="button" aria-pressed="true"><i class="fas fa-edit"></i> Đăng Tin</a>
                                <a id="btnGroupDrop1" type="button" class="dropdown-toggle btn btn-primary  text-light rounded-0  h-100 border-left    p-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle mr-2 "></i> <?= $_SESSION['user'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right  " aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=doanh_nghiep"><i class="fas fa-list-alt mr-2"></i> Kiểm Tra Thông Tin </a>
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=home"><i class="fas fa-history    mr-2"></i> Danh sách ứng tuyển</a>
                                    <a class="dropdown-item" href="<?= SITE_URL ?>/?ctrl=home&act=logout"><i class="fas fa-sign-out-alt   mr-2 "></i> Đăng xuất</a>
                                </div>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            <?php } else { ?>
                <div id="header-login" class="col p-0">
                    <div class="d-none d-lg-flex justify-content-end h-100 ">
                        <a data-toggle="modal" href="#login" class="btn btn-light rounded-0  h-100 border-left   p-4" role="button" aria-pressed="true">SINH VIÊN</a>
                        <a data-toggle="modal" href="#login" class="btn btn-primary  rounded-0  h-100 border-left    p-4" role="button" aria-pressed="true">DOANH NGHIỆP</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </header>
    <!-- Show box login & Box đăng tuyển-->
    <?php if (isset($_SESSION['sid'])) {
        if (isset($_SESSION['schuc_vu']) && ($_SESSION['schuc_vu'] == 1)) {
            $thongtin_dn =  checkdoanhnghiep_iduser($_SESSION['sid']);
            $nhomnganh = ds_nn();
            $nganh = ds_nganh(6);
        }
    ?>
        <!-- Chỗ đẻ của Nghĩa dep trai -->
        <div class="modal fade" id="exampleModal-Nghia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header alert alert-primary mb-0 py-4 px-4">
                        <div class="col-12">
                            <h2 class="d-inline">Đăng Tuyển </h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <form action="?ctrl=doanh_nghiep&act=taodangtuyen" method="post">
                        <div class="modal-body">
                            <div class="container">
                                <div id="doanhnghiep">
                                    <div class=" row mt-4 m-0 py-3">
                                        <div class="Nghia row">
                                            <div class="col-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text bg-primary text-white " for="chonnn">Ngành nghề</label>
                                                    </div>
                                                    <select class="custom-select" id="chon_nn" name="hinhthuclamviec">
                                                        <?php foreach ($nhomnganh as $row) { ?>
                                                            <option value="<?= $row['id_nn'] ?>"><?= $row['ten_nn'] ?></option>
                                                        <?php } ?>
                                                    </select>

                                                    <select class="custom-select" id="nhomnganh" name="nganh_dt">
                                                        <?php
                                                        foreach ($nganh as $row) {
                                                            echo (' <option value="' . $row['id_nganh'] . '">' . $row['ten_nganh'] . '</option>');
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="input-group mb-5">
                                                    <div class="input-group-prepend mr-0" style="width: 25%;">
                                                        <span class="input-group-text bg-primary text-white  w-100" id="basic-addon3">Ngày hết hạn:</span>
                                                    </div>
                                                    <input type="date" name="thoi_gian" class="N-ninput form-control" placeholder="Địa chỉ làm việc*" aria-describedby="basic-addon3" value="<?= $thongtin_dn['dia_chi'] ?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend mr-0" style="width: 15%;">
                                                        <span class="input-group-text  w-100" id="basic-addon2">Tiêu đề:</span>
                                                    </div>
                                                    <input type="text" name="tieude" class="N-ninput form-control " placeholder="Tiêu đề bài đăng*" aria-describedby="basic-addon2">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend mr-0 " style="width: 15%;">
                                                        <span class="input-group-text w-100" id="basic-addon1">Vị trí:</span>
                                                    </div>
                                                    <input type="text" name="" class="N-ninput form-control" readonly placeholder="Nhân viên thực tập" aria-label="Nhân viên thực tập" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend mr-0" style="width: 15%;">
                                                        <span class="input-group-text  w-100" id="basic-addon3">Địa chỉ:</span>
                                                    </div>
                                                    <input type="text" name="diachi" class="N-ninput form-control" readonly placeholder="Địa chỉ làm việc*" aria-describedby="basic-addon3" value="<?= $thongtin_dn['dia_chi'] ?>">
                                                </div>

                                                <hr class="new mb-5">
                                                <div class="row p-3 my-3 bg-light rounded">
                                                    <h4 class="text-primary ">Option cho sinh viên</h4>
                                                </div>
                                                <div class="row pl-3 mb-1">
                                                    <div class="N-input mb-5 mr-4 ">
                                                        <input type="number" name="luongthapnhat" class="N-ip form-control" placeholder="Lương thấp nhất*">
                                                        <span class="VND">VND</span>
                                                    </div>
                                                    <div class="N-input mb-5 ">
                                                        <input type="number" name="luongcaonhat" class="N-ip form-control" placeholder="Lương cao nhất*">
                                                        <span class="VND">VND</span>
                                                    </div>
                                                </div>
                                                <div class="row pl-3 mb-4">
                                                    <div class="N-input mb-4 mr-4"><input type="number" name="thoigiantt" class="N-ip form-control" placeholder="Thời gian thực tập*">
                                                        <span class="VND">Tháng</span>
                                                    </div>
                                                    <div class="N-input mb-4 "><input type="number" name="soluongtuyen" class="N-ip form-control" placeholder="Số lượng cần tuyển*">
                                                        <span class="VND">SV</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text bg-primary text-white " for="gender3">Hình thức</label>
                                                            </div>
                                                            <select class="custom-select" id="gender3">
                                                                <option selected>Thực tập sinh</option>
                                                            </select>
                                                            <select class="custom-select" id="gender3" name="hinhthuclamviec">
                                                                <option value="0" active>Part-time</option>
                                                                <option value="1">Full-time</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text bg-primary text-white " for="gender3">Thời gian</label>
                                                            </div>
                                                            <select class="custom-select" id="gender3">
                                                                <option selected>Giờ hành chính</option>
                                                            </select>
                                                            <select class="custom-select" id="gender3" name="thoigianlamviec">
                                                                <option value="0" active>Thứ 2 - Thứ 6</option>
                                                                <option value="1">Thứ 2 - Thứ 7</option>
                                                                <option value="2">Thứ 2 - Chủ nhật</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="new mb-5">
                                                <div class="row p-3 my-3 bg-light rounded">
                                                    <h4 class="text-primary ">Phúc lợi</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <!-- Default inline 3-->
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input " id="defaultInline3" name="thuong">
                                                            <label class="custom-control-label" for="defaultInline3"> <i class="fas fa-award  text-info  ml-2"></i> Chế độ thưởng</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="defaultInline4" name="daotao">
                                                            <label class="custom-control-label" for="defaultInline4"><i class="	fas fa-atom   text-info  ml-2"></i> Chương trình đào tạo</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="defaultInline5" name="tangluong">
                                                            <label class="custom-control-label" for="defaultInline5"><i class="fa fa-level-up   text-info  ml-2"></i> Tăng lương</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="defaultInline6" name="nghiphep">
                                                            <label class="custom-control-label" for="defaultInline6">
                                                                <i class="fas fa-business-time  text-info  ml-2"></i> Nghỉ phép</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="defaultInline2" name="dulich">
                                                            <label class="custom-control-label" for="defaultInline2">
                                                                <i class="fas fa-plane  text-info  ml-2"></i> Du lịch</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox  mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="defaultInline1" name="baohiem">
                                                            <label class="custom-control-label" for="defaultInline1"><i class="fas fa-suitcase  text-info  ml-2 "></i> Bảo hiểm</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Default inline 2-->
                                                <!-- Default inline 2-->
                                                <!-- Default inline 3-->
                                                <hr class="new mb-5">
                                                <div class="row p-3 my-3 bg-light rounded">
                                                    <h4 class="text-primary ">Mô tả công việc</h4>
                                                </div>
                                                <textarea name="mota" id="" class="editor" cols="30" rows="10"></textarea>
                                                <hr class="new mb-5">
                                                <div class="row p-3 my-3 bg-light rounded">
                                                    <h4 class="text-primary ">Yêu cầu công việc</h4>
                                                </div>
                                                <textarea name="yeucau" id="" class="editor" cols="30" rows="10"></textarea>
                                                <hr class="new mb-5">
                                                <div class="row p-3 my-3 bg-light rounded">
                                                    <!-- <h4 class="text-primary ">Các thông tin cơ bản khác</h4> -->
                                                    <h4 class="text-primary ">Quyền lợi</h4>
                                                </div>
                                                <textarea name="quyenloi" id="" class="editor" cols="30" rows="10"></textarea>
                                                <input type="hidden" name="id_dn" value="<?= $_SESSION['sid_dn'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light px-4">
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-danger my-3 py-2 px-4" data-dismiss="modal">Hủy</button>
                                <button type="submit" name="submit" class="btn btn-success my-3 py-2 px-4">Đăng bài</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php  } else { ?>
        <div class="modal fade" id="login">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="view/images/logo-2.png" class="w-25" alt="">
                        <button type="button" class="close p-3" data-dismiss="modal">x</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row ">
                        <div class="d-none d-lg-inline col-6 rounded">
                            <img src="view/images/login.jpg" alt="">
                            <!-- <img src="view/images/img_login.png" alt="login_page" class="h-img-login"> -->
                        </div>
                        <div class="col-lg-6 ">
                            <h2 class="font-weight-bold">Đăng Nhập</h2>
                            <form action="javascript:getcontent()" class="mt-4">

                                <div style="min-height: 30px;">
                                    <p id="dangnhapsai" class="text-danger font-italic"></p>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="">Tên đăng nhập</label> -->
                                    <input type="text" name="user" id="user" class="form-control" aria-describedby="helpId" placeholder="Tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="">Mật khẩu</label> -->
                                    <input type="password" name="pass" id="pass" class="form-control" aria-describedby="helpId" placeholder="Mật khẩu">
                                </div>

                                <button type="submit" id="login" class="btn btn-primary btn-block mt-4">Đăng nhập</button>

                            </form>
                            <a href="" class="text-primary mt-3 d-block">Quên mật khẩu ?</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Show menu -->
    <nav id="nav-togger" class="border shadow-lg">
        <div class="list-group">
            <div class="d-flex d-lg-none  list-group-item list-group-item-action p-0 mb-3">
                <a data-toggle="modal" href="#login" class="btn btn-light rounded-0  h-100 border w-50  py-3" role="button" aria-pressed="true">SINH VIÊN</a>
                <a data-toggle="modal" href="#login" class="btn btn-primary  rounded-0  h-100 border w-50  py-3" role="button" aria-pressed="true">DOANH NGHIỆP</a>
            </div>
            <button type="button" class="list-group-item list-group-item-action rounded-0   py-3 active ">Trang
                chủ</button>
            <button type="button" class="list-group-item list-group-item-action rounded-0  py-3">Hỗ trợ</button>
            <button type="button" class="list-group-item list-group-item-action rounded-0  py-3">Liên lạc</button>
            <button type="button" class="list-group-item list-group-item-action rounded-0  py-3">Về chúng tôi</button>
            <button type="button" class="list-group-item list-group-item-action rounded-0  py-3">Hướng dẫn đăng
                bài</button>
            <button type="button" class="list-group-item list-group-item-action rounded-0  py-3">Hướng dẫn ứng
                tuyển</button>
        </div>
    </nav>
    <div id="dangtuyen">

    </div>
    <div id="overlay-nav"></div>
    <!-- NỘI DUNG CHÍNH -->
    <?php
    if ($view == "view/home.php") {
    ?>
        <section id="banner" class="wrap">
            <div class="banner-img">
            </div>
            <div class="banner-title  text-center">
                <div class="container">
                    <p>Thực Chiến</p>
                    <p><span class="d-none d-lg-inline">Tham Gia</span> Ứng Tuyển Ngay</p>
                    <a href="index.php?ctrl=home&act=listjob" class="btn btn-primary btn-lg rounded-pill mt-5 px-5">Tìm việc
                    </a>
                </div>
            </div>
        </section>
    <?php } ?>
    <main id="main">
        <div class="container">
            <?php include $view; ?>
        </div>
    </main>
    <footer id="footer " class="wrap bg-dark text-light  ">
        <div class="container ">
            <div class="col-3 p-0 ">
                <img src="view/images/logo-2.png " alt=" ">
            </div>
            <h3>Phòng Quan Hệ Doanh Nghiệp</h3>
            <div class="row mt-5 ">
                <div class="col-lg-6 mb-3 ">
                    <h5 class="pb-3 ">Thông tin trường FPT Polytechnic</h5>
                    <div class="row text-gray ">
                        <div class="col-lg-5 small ">
                            <p class="font-weight-bold my-1 "><i class="fas fa-location-circle mr-1 "></i> Cơ sở Hà Nội
                            </p>
                            <p class="m-0 ">Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
                            <p><i class="fas fa-phone-alt "></i> <u>(024) 7300 1955</u></p>
                        </div>
                        <div class="col-lg-5 mb-3 small ">
                            <p class="font-weight-bold my-1 "><i class="fas fa-location-circle mr-1 "></i> Cơ sở Hồ Chí
                                Minh</p>
                            <p class="m-0 ">778/B1 Nguyễn Kiệm, P.4, Q. Phú Nhuận, TP. Hồ Chí Minh</p>
                            <p><i class="fas fa-phone-alt "></i> <u> (028) 62523434</u></p>
                        </div>
                        <div class="col-lg-5 mb-3 small ">
                            <p class="font-weight-bold my-1 "><i class="fas fa-location-circle mr-1 "></i> Cơ sở Đà Nẵng
                            </p>
                            <p class="m-0 ">Số 137 Nguyễn Thị Thập, Phường Hòa Minh, Quận Liên Chiểu, TP. Đà Nẵng</p>
                            <p><i class="fas fa-phone-alt "></i> <u>(0236) 3710 999</u></p>
                        </div>
                        <div class="col-lg-5 small ">
                            <p class="font-weight-bold my-1 "><i class="fas fa-location-circle mr-1 "></i> Cơ sở Cần Thơ
                            </p>
                            <p class="m-0 ">Số 288, Nguyễn Văn Linh, phường An Khánh, quận Ninh Kiều, Tp. Cần Thơ</p>
                            <p><i class="fas fa-phone-alt "></i> <u>(0292) 7300 468</u></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3 ">
                    <h5 class="pb-3 ">Dành cho doanh nghiệp</h5>
                    <div class="nav flex-column  ">
                        <a class="nav-item nav-link px-0 text-gray" href="# ">Đăng ký để làm đối tác</a>
                        <a class="nav-item nav-link px-0 text-gray" href="# ">Hỗ trợ doanh nghiệp</a>
                        <a class="nav-item nav-link px-0 text-gray" href="# ">Phản hồi của doanh nghiệp</a>
                        <a class="nav-item nav-link px-0 text-gray" href="# ">Tin tức doanh nghiệp</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3 ">
                    <h5 class="pb-3 ">Dành cho sinh viên</h5>
                    <div class="nav flex-column ">
                        <a class="nav-item nav-link px-0 text-gray  " href="# ">Đăng ký thực tập sớm</a>
                        <a class="nav-item nav-link px-0 text-gray " href="# ">Hỗ trợ sinh viên</a>
                        <a class="nav-item nav-link px-0 text-gray " href="# ">Phản hồi của sinh viên</a>
                        <a class="nav-item nav-link px-0 text-gray " href="# ">Tin tức sinh viên</a>
                    </div>
                </div>
            </div>
            <div class="row text-gray text-center ">
                <p class="col">Copyright <i class="fa fa-copyright mx-2 " aria-hidden="true "></i> 2020 Bản quyền thuộc
                    về <b>Group 6</b></p>
            </div>
        </div>
    </footer>
    <!-- JS Boostrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous ">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous ">
    </script>
    <!-- JS tynyint -->
    <script src="https://cdn.tiny.cloud/1/qtyaj3v4ktk0l2i14oqdby9a72wog89twljoleu6f9syjbvp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.editor',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            //   toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <!-- My script -->
    <script type="text/javascript" src="view/js/script.js "></script>
    <script>
        // đăng nhâp
        function getcontent() {
            var user = document.getElementById('user').value;
            var pass = document.getElementById('pass').value;
            var arr = [user, pass];
            $.ajax({
                type: "post",
                url: "index.php?act=login",
                data: {
                    login: arr
                },
                success: function(data) {

                    if (data == 0) {
                        location.reload();
                    } else if (data == 10) {

                        window.location = "index.php?ctrl=sinh_vien&act=ttcn_edit";
                        alert('Vui lòng nhập Thông tin cá nhân do lần đầu đăng nhập');
                    } else if (data == 1) {
                        window.location = "index.php?ctrl=doanh_nghiep";
                    } else if (data == 2) {
                        alert("bạn sẽ chuyển tới trang ADmin");
                        window.location = "../admin/index.php";
                    } else {
                        document.getElementById("dangnhapsai").innerHTML = "Tài khoản hoặc mật khẩu không đúng !";
                    }
                }
            });
        }
    </script>
</body>

</html>