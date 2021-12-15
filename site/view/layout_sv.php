<div id="sinhvien">
    <div class="row mt-4 m-0 py-3">
        <div class="col-3 px-3">
            <div class="sinhvien-menu shadow py-3 rounded">
                <ul class="h-sidebar-navigation mt-0 px-3 pb-3 ">
                    <li class="h-header rounded">HỒ SƠ CỦA BẠN</li>
                    <li>
                        <a href="index.php?ctrl=sinh_vien">
                            <i class="far fa-user"></i>
                            Quản lý thông tin
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=sinh_vien&act=cv_index">
                            <i class="far fa-file-alt"></i>
                            Quản lý hồ sơ
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=sinh_vien&act=user_edit">
                            <i class="far fa-key"></i>
                            Đổi mật khẩu
                        </a>
                    </li>
                    <li class="h-header rounded">VIỆC LÀM &amp; HỖ TRỢ</li>
                    <li>
                        <a href="index.php?ctrl=sinh_vien&act=danh_sach_don">
                            <i class="far fa-clipboard-list    "></i>
                            Danh sách đơn xin thực tập
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="far fa-heart    "></i>
                            Việc làm đã lưu
                        </a>
                    </li>
                    <li>
                        <a href="index.php?ctrl=sinh_vien&act=sv_vlut">
                            <i class="far fa-file-powerpoint    "></i>
                            Việc làm ứng tuyển
                        </a>
                    </li>
                    <li>
                        <a href="?ctrl=sinh_vien&act=sv_thongbao">
                            <i class="far fa-info-circle" aria-hidden="true"></i> Thông báo
                            <?php $soluong=demThongbao_($_SESSION['sid_sv']);?> 
                           <?php if($soluong>0){?>
                              <span class="badge badge-danger"><?=$soluong?></span>
                           <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="?ctrl=home&act=logout">
                            <i class="far fa-sign-out-alt "></i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="h-box-detail h-box-right">
            <?php include $view_sv; ?>
        </div>

    </div>
</div>